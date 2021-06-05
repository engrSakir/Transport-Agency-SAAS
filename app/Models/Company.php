<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;



    public function branches(){
        return $this->hasMany(Branch::class, 'company_id', 'id');
    }

    public function admins(){
        return $this->hasMany(User::class, 'company_id', 'id')->where('type', 'Admin');
    }

    public function managers(){
        return $this->hasMany(User::class, 'company_id', 'id')->where('type', 'Manager');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'company_id', 'id');
    }

    //Only latest package
    public function purchasePackage(){
        return $this->hasOne(PurchasePackage::class, 'company_id', 'id')->latest();
    }

    //All of package purchase history
    public function purchasePackages(){
        return $this->hasMany(PurchasePackage::class, 'company_id', 'id');
    }

    public function purchaseMessages(){
        return $this->hasMany(PurchaseMessage::class, 'company_id', 'id');
    }

    public function messageHistories(){
        return $this->hasMany(MessageHistory::class, 'company_id', 'id');
    }


    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();
        static::deleting(function($company) { // before delete() method call this
            $company->branches()->delete();
            $company->admins()->delete();
            $company->managers()->delete();
            $company->messageHistories()->delete();
            $company->purchaseMessages()->delete();
            $company->transactions()->delete();
            // do the rest of the cleanup...
        });
    }
}
