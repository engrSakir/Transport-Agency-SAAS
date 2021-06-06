<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masking_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('reporting_email')->nullable();

            $table->boolean('invoice_sms_to_receiver_at_receive')->default(false);
            $table->boolean('invoice_sms_to_receiver_at_on_going')->default(false);
            $table->boolean('invoice_sms_to_receiver_at_delivered')->default(false);

            $table->boolean('invoice_sms_to_sender_at_receive')->default(false);
            $table->boolean('invoice_sms_to_sender_at_on_going')->default(false);
            $table->boolean('invoice_sms_to_sender_at_delivered')->default(false);

            $table->boolean('conditional_invoice_sms_to_receiver_at_receive')->default(false);
            $table->boolean('conditional_invoice_sms_to_receiver_at_on_going')->default(false);
            $table->boolean('conditional_invoice_sms_to_receiver_at_delivered')->default(false);
            $table->boolean('conditional_invoice_sms_to_receiver_at_break')->default(false);

            $table->boolean('conditional_invoice_sms_to_sender_at_receive')->default(false);
            $table->boolean('conditional_invoice_sms_to_sender_at_on_going')->default(false);
            $table->boolean('conditional_invoice_sms_to_sender_at_delivered')->default(false);
            $table->boolean('conditional_invoice_sms_to_sender_at_break')->default(false);

            $table->boolean('sms_chalan_information_to_receiver_branch')->default(false);
            $table->boolean('custom_sms_to_random_number')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
