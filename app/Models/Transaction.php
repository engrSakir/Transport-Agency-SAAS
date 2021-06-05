<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable=[
        'company_id',
        'creator_id',
        'updater_id',
        'type',
        'amount',
        'method',
        'purpose',
        'description',
        'transaction',
        'receipt',
        'status',
        'approved_by_id',
    ];


}
