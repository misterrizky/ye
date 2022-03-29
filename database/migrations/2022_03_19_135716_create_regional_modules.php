<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionalModules extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
        });
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->string('name');
        });
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->integer('province_id');
            $table->string('name');
            $table->string('postcode')->nullable();
        });
        Schema::create('subdistricts', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->string('name');
            $table->string('postcode')->nullable();
        });
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->integer('subdistrict_id');
            $table->string('name');
            $table->string('postcode')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('subdistricts');
        Schema::dropIfExists('villages');
    }
}
