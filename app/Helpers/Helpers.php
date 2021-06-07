<?php

use App\Models\BranchLink;
use App\Models\CustomPage;
use App\Models\StaticOption;
use App\Models\Transaction;
use App\Models\WebsiteMessage;
use Illuminate\Support\Facades\Http;



if (!function_exists('random_code')){

    function set_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function get_static_option($key)
    {
        if (StaticOption::where('option_name', $key)->first()) {
            $return_val = StaticOption::where('option_name', $key)->first();
            return $return_val->option_value;
        }
        return null;
    }

    function update_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        } else {
            StaticOption::where('option_name', $key)->update([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function set_env_value(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }

   function active_custom_pages(){
       return CustomPage::all();
   }

   function count_of_website_incomplete_messages(){
       return WebsiteMessage::where('is_process_complete', false)->count();
   }

   function check_superadmin(){
       if(auth()->user()->type == 'Super Admin'){
           return true;
       }
       return false;
   }

   function check_admin(){
       if(auth()->user()->type == 'Admin'){
           return true;
       }
       return false;
   }

   function check_manager(){
       if(auth()->user()->type == 'Manager'){
           return true;
       }
       return false;
   }

   function check_customer(){
       if(auth()->user()->type == 'Customer'){
           return true;
       }
       return false;
   }

   function check_branch_link($from_branch_id, $to_branch_id){
       if(BranchLink::where('from_branch_id', $from_branch_id)->where('to_branch_id', $to_branch_id)->count() > 0){
           return true;
       }
       return false;
   }

   function en_to_bn($en_value){
       $search         = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
       $replace_by     =  array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
       return str_replace($search, $replace_by, $en_value);
   }

   function bn_to_en($bn_value){
       $replace_by  = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
       $search      =  array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
       return str_replace($search, $replace_by, $bn_value);
       //return filter_var(str_replace($search, $replace_by, $bn_value), FILTER_SANITIZE_NUMBER_INT);
   }

    function sms($number, $message){
        $text = urlencode($message);
        $user = get_static_option('sms_api_key');
        $pass = get_static_option('sms_api_pass');
        $smsresult =  Http::get("http://66.45.237.70/api.php?username=$user&password=$pass&number=$number&message=$text");

        if(strpos($smsresult, '1101') !== false){
            return true;
        } else{
            return false;
        }
    }

    function paid_sms_sender($number, $message){
        $response = null;

        if(auth()->user()->type == 'Manager'){
            $company = auth()->user()->branch->company;
            $branch_id = auth()->user()->branch->id;
            if($company->transactions()->where('status', 'Approved')->where('type', 'Credit')->sum('amount')
                - $company->transactions()->where('status', 'Approved')->where('type', 'Debit')->sum('amount') < message_count_from_string($message) * $company->purchasePackage->package->price_per_message){
                $response = "আপনার কোম্পানির একাউন্টে মেসেজ দেওয়ার মতো পর্যাপ্ত পরিমাণ টাকা নেই। দয়া করে মেসেজ ব্যবহার করতে এডমিনকে অবগত করুন।";
                return $response;
            }
        }

        if(auth()->user()->type == 'Admin'){
            $company = auth()->user()->company;
            $branch_id =null;
            if($company->transactions()->where('status', 'Approved')->where('type', 'Credit')->sum('amount')
                - $company->transactions()->where('status', 'Approved')->where('type', 'Debit')->sum('amount') < message_count_from_string($message) * $company->purchasePackage->package->price_per_message){
                $response = "আপনার কোম্পানির একাউন্টে মেসেজ দেওয়ার মতো পর্যাপ্ত পরিমাণ টাকা নেই। দয়া করে মেসেজ ব্যবহার করতে টাকায় যোগ করুন।";
                return $response;
            }
        }


        //After checking all send to api
        $api_response = Http::acceptJson()->withToken(env('DATATECH_BD_LTD_SMS_API_SECRET'))->asForm()->post('http://sms.datatechbd.com/api/send-sms', [
            'number' => $number,
            'message' => $message,
        ]);

        $response = $api_response->json()['message']; //Get a single string message from response collection

        if($response == "SUCCESS"){
            $transaction = new Transaction();
            $transaction->company_id = $company->id;
            $transaction->creator_id = auth()->user()->id;
            $transaction->type = 'Debit';
            $transaction->amount = message_count_from_string($message) * $company->purchasePackage->package->price_per_message;
            $transaction->method = 'Balance';
            $transaction->purpose = 'Send SMS :'.$number;
            $transaction->status = 'Approved';
            $transaction->save();

            $message_histories = new \App\Models\MessageHistory();
            $message_histories->company_id = $company->id;
            $message_histories->branch_id = $branch_id;
            $message_histories->package_id = $company->purchasePackage->package->id;
            $message_histories->message_cost = message_count_from_string($message) * $company->purchasePackage->package->price_per_message;

            $message_histories->sender_id =  auth()->user()->id;
            $message_histories->receiver_id = \App\Models\User::where('phone', $number)->first()->id ?? null;
            $message_histories->number = $number;
            $message_histories->message =  $message;
            $message_histories->text_count = strlen($message);
            $message_histories->message_count = message_count_from_string($message);
            $message_histories->save();
        }
        return $response;
    }

    function message_count_from_string($string){
        $counter = strlen($string) / 160;
        if (is_float($counter)){
            $counter = $counter + 1;
        }
        return intval($counter);
    }


}
