<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->foreignId('creator_id')->nullable();
            $table->foreignId('updater_id')->nullable();
            $table->string('type')->default('Debit')->comment('Debit | Credit');
            //যখন সে 500 টাকা তার অ্যাকাউন্টে বরবে তার মানে এটা Credit হবে এবং যখন সে মেসেজ কিনবে অথবা কোন প্যাকেজ কিনবে তার মানে এটা Debit হলো
            $table->string('amount')->default(0);
            $table->string('method')->nullable();
            $table->string('purpose')->nullable();
            $table->longtext('description')->nullable();
            $table->string('transaction')->nullable()->comment('Transaction ID');
            $table->string('receipt')->nullable()->comment('image');
            $table->string('status')->default('Pending')->comment('Approved | Pending | Rejected');
            $table->foreignId('approved_by_id')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
