<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('name');
            $table->integer('branch')->default(1)->comment('max-permitted');
            $table->integer('admin')->default(1)->comment('max-permitted');
            $table->integer('manager')->default(1)->comment('max-permitted');
            $table->integer('customer')->default(50)->comment('max-permitted');
            $table->integer('invoice')->default(100)->comment('max-permitted');
            $table->integer('sms')->default(100)->comment('free');
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
        Schema::dropIfExists('packages');
    }
}
