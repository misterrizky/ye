<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrmModules extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id')->default(0)->nullable();
            $table->string('name');
        });
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nip',20)->unique()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('date_birth')->nullable();
            $table->longText('jobdesc')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('address')->nullable();
            $table->integer('province_id')->default(0)->nullable();
            $table->integer('city_id')->default(0)->nullable();
            $table->integer('subdistrict_id')->default(0)->nullable();
            $table->string('postcode',5)->nullable();
            $table->integer('department_id')->default(0)->nullable();
            $table->integer('position_id')->default(0)->nullable();
            $table->string('avatar')->nullable();
            $table->string('cv')->nullable();
            $table->string('google_id')->nullable();
            $table->string('paypal')->nullable();
            $table->string('password')->nullable();
            $table->string('st',1)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('employee_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0)->nullable();
            $table->timestamp('presence_at')->nullable();
            $table->timestamp('finish_at')->nullable();
        });
        Schema::create('employee_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0)->nullable();
            $table->integer('bank_id')->default(0)->nullable();
            $table->string('code');
            $table->timestamps();
        });
        Schema::create('employee_bpjs', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0)->nullable();
            $table->string('code');
            $table->timestamps();
        });
        Schema::create('employee_certificates', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0)->nullable();
            $table->string('file');
            $table->timestamps();
        });
        Schema::create('employee_payrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0)->nullable();
            $table->integer('employee_bank_account_id')->default(0)->nullable();
            $table->string('amount')->default(0)->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
        Schema::create('vacancy_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->longText('requirement');
            $table->longText('facilities');
            $table->integer('department_id');
            $table->integer('position_id');
            $table->string('rates');
            $table->timestamps();
        });
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('vacancy_id')->default(0);
            $table->integer('employee_id')->default(0);
            $table->string('expected_salary');
            $table->longText('messages');
            $table->string('st',1);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('departments');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('employee_attendances');
        Schema::dropIfExists('employee_bank_accounts');
        Schema::dropIfExists('employee_bpjs');
        Schema::dropIfExists('employee_certificates');
        Schema::dropIfExists('employee_payrolls');
        Schema::dropIfExists('vacancy_jobs');
        Schema::dropIfExists('job_applications');
    }
}
