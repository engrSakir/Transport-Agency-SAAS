<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->boolean('is_active')->default(true)->comment('0 inactive | 1 Active');
            $table->boolean('is_head_office')->default(false)->comment('0 inactive | 1 Active');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('sender_search_length')->default(2);
            $table->integer('receiver_search_length')->default(2);
            $table->integer('global_search_length')->default(2);
            $table->integer('custom_inv_counter_max_value')->default(999);
            $table->integer('custom_inv_counter_min_value')->default(1);
            $table->integer('custom_chalan_counter_max_value')->default(999);
            $table->integer('custom_chalan_counter_min_value')->default(1);
            $table->text('invoice_heading_one')->nullable();
            $table->text('invoice_heading_two')->nullable();
            $table->text('chalan_heading_one')->nullable();
            $table->text('chalan_heading_two')->nullable();
            $table->text('chalan_heading_three')->nullable();
            $table->string('invoice_due_watermark')->nullable()->comment('Invoice due watermark image');
            $table->string('invoice_paid_watermark')->nullable()->comment('Invoice paid watermark image');
            $table->string('invoice_head_design')->nullable()->comment('Invoice head image');
            $table->string('chalan_head_design')->nullable()->comment('Chalan head image');
            $table->string('expense_head_design')->nullable()->comment('Expense head image');
            $table->boolean('active_image_head_invoice')->default(false)->comment('0 inactive | 1 Active');
            $table->boolean('active_image_head_chalan')->default(false)->comment('0 inactive | 1 Active');
            $table->boolean('active_conditional_booking')->default(false)->comment('0 inactive | 1 Active');
            $table->boolean('active_expense_system')->default(false)->comment('0 inactive | 1 Active');
            $table->string('invoice_style')->default('A5')->comment('A5|A4');
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
        Schema::dropIfExists('branches');
    }
}
