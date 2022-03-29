<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleModules extends Migration
{
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->date('valid_until')->nullable();
            $table->timestamps();
        });
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->default(0);
            $table->integer('product_id')->default(0);
            $table->string('qty')->default(1);
            $table->enum('license_type',['Regular','Extended'])->default('Regular');
            $table->enum('is_extend',['N','Y'])->default('N');
        });
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->default(0);
            $table->integer('customer_id')->default(0);
            $table->integer('client_id')->default(0);
            $table->integer('voucher_id')->default(0);
            $table->string('total')->default(0);
            $table->string('discount')->default(0);
            $table->string('grand_total')->default(0);
            $table->string('payment_method')->nullable();
            $table->enum('st',['Wait for payment','Cancel','Finish'])->default('Wait for payment');
            $table->timestamps();
        });
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->integer('sale_id')->default(0);
            $table->integer('product_id')->default(0);
            $table->enum('license_type',['Regular','Extended'])->default('Regular');
            $table->enum('is_extend',['N','Y'])->default('N');
            $table->string('price')->default(0);
            $table->string('qty')->default(0);
            $table->string('subtotal')->default(0);
        });
        Schema::create('sale_licenses', function (Blueprint $table) {
            $table->id();
            $table->integer('sale_detail_id')->default(0);
            $table->string('code')->nullable();
            $table->date('valid_until')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('vouchers');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('sales');
        Schema::dropIfExists('sale_details');
        Schema::dropIfExists('sale_licenses');
    }
}
