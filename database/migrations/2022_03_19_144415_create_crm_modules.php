<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmModules extends Migration
{
    public function up()
    {
        Schema::create('company_industries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        });
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->string('company_industry_id')->default(0)->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('username',30)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->string('password')->nullable();
            $table->string('google_id')->nullable();
            $table->enum('category',['Offline','Online'])->nullable();
            $table->enum('st',['Active','Non Active'])->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->string('name')->nullable();
            $table->string('username',30)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->string('password')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('google_id')->nullable();
            $table->enum('category',['Offline','Online'])->nullable();
            $table->enum('st',['Active','Non Active'])->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->string('name')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->enum('lead_referral_source',['Google','projects.co.id','freelancer.com','Relationship','Website','Other'])->nullable();
            $table->timestamps();
        });
        Schema::create('lead_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('lead_id')->default(0);
            $table->date('date')->nullable();
            $table->longText('notes')->nullable();
            $table->enum('type',['Follow Up','Meeting'])->default('Follow Up');
            $table->enum('st',['Pending','Completed'])->default('Pending');
            $table->timestamps();
        });
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->string('company_industry_id')->default(0)->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('username',30)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->string('password')->nullable();
            $table->date('date_birth')->nullable();
            $table->enum('lead_referral_source',['Google','projects.co.id','freelancer.com','Relationship','Website','Other'])->nullable();
            $table->string('website')->nullable();
            $table->string('google_id')->nullable();
            $table->enum('type',['Client','Customer','Lead','Partner'])->nullable();
            $table->enum('category',['Offline','Online'])->nullable();
            $table->enum('st',['Active','Non Active'])->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
        Schema::create('client_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('client_id')->default(0);
            $table->date('date')->nullable();
            $table->longText('notes')->nullable();
            $table->enum('type',['Follow Up','Meeting'])->default('Follow Up');
            $table->enum('st',['Pending','Completed'])->default('Pending');
            $table->timestamps();
        });
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('client_id')->default(0);
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('amount')->nullable();
            $table->string('total_payment')->nullable();
            $table->string('total_spend')->nullable();
            $table->date('start_at')->nullable();
            $table->date('due_at')->nullable();
            $table->enum('st',['Pending','On Going','Finish'])->nullable();
            $table->timestamps();
        });
        Schema::create('project_spends', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('amount')->nullable();
            $table->timestamps();
        });
        Schema::create('project_quotations', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('code')->nullable();
            $table->string('file')->nullable();
            $table->date('date')->nullable();
            $table->enum('st',['Pending','Rejected','Accepted'])->nullable();
            $table->timestamps();
        });
        Schema::create('project_mous', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('file')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
        Schema::create('project_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('file')->nullable();
            $table->string('amount')->nullable();
            $table->date('date')->nullable();
            $table->enum('st',['Pending','Accepted'])->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamps();
        });
        Schema::create('project_mohs', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('file')->nullable();
            $table->date('date')->nullable();
            $table->enum('st',['Pending','Accepted'])->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('company_industries');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_spends');
        Schema::dropIfExists('project_quotations');
        Schema::dropIfExists('project_mous');
        Schema::dropIfExists('project_invoices');
        Schema::dropIfExists('project_mohs');
    }
}
