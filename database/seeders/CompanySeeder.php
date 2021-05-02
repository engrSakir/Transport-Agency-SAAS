<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Package;
use App\Models\PurchaseMessage;
use App\Models\PurchasePackage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $company = new Company();
            $company->name = 'Company '.$i;
            $company->save();
        }

        //Company purchase package
        for ($i = 1; $i <= 10; $i++) {
            $purchase_package = new PurchasePackage();
            $purchase_package->company_id = $i;
            $purchase_package->package_id = $i;
            $purchase_package->save();

            $purchase_message = new PurchaseMessage();
            $purchase_message->company_id = $i;
            $purchase_message->purchaser_id = $i;
            $purchase_message->message_amount = Package::find($i)->free_sms;
            $purchase_message->price_per_message = Package::find($i)->price_per_message;
            $purchase_message->package_id = $i;
            $purchase_message->save();
        }
    }
}
