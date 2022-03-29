<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingModules extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('logo');
            $table->string('icon');
            $table->longText('about')->nullable();
            $table->longText('expertise')->nullable();
            $table->longText('visi_misi')->nullable();
            $table->timestamps();
        });
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('driver');
            $table->string('host');
            $table->string('port');
            $table->string('from_address');
            $table->string('from_name');
            $table->string('encryption');
            $table->string('username');
            $table->string('password');
        });
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('year',4)->nullable();
        });
        Schema::create('banner', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('banner')->nullable();
            $table->enum('pages',['home','about','service','product','case_studies','contact'])->nullable();
        });
        Schema::create('inbox', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone',15);
            $table->longText('messages');
            $table->timestamp('created_at');
        });
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('banner')->nullable();
            $table->enum('type',['main','step'])->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('mails');
        Schema::dropIfExists('histories');
        Schema::dropIfExists('banner');
        Schema::dropIfExists('inbox');
        Schema::dropIfExists('services');
    }
}
