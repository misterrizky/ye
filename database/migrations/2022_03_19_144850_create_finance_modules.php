<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceModules extends Migration
{
    public function up()
    {
        Schema::create('coa_categories', function (Blueprint $table) {
            $table->id();
            $table->string('code',10);
            $table->string('name');
        });
        Schema::create('coas', function (Blueprint $table) {
            $table->id();
            $table->integer('coa_category_id')->default(0);
            $table->string('code',10);
            $table->string('name');
        });
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('code',10);
            $table->date('date');
            $table->integer('coa_id')->default(0);
            $table->string('debit')->default(0);
            $table->string('credit')->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('coa_categories');
        Schema::dropIfExists('coas');
        Schema::dropIfExists('journals');
    }
}
