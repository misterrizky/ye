<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterModules extends Migration
{
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('days', function (Blueprint $table) {
            $table->string('d',2)->primaryKey();
        });
        Schema::create('isic_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('isics', function (Blueprint $table) {
            $table->id();
            $table->integer('isic_type_id')->default(0);
            $table->string('code');
            $table->string('name');
        });
        Schema::create('legal_doc_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('legal_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('doc_type_id')->default(0);
            $table->string('code');
            $table->string('attachment');
        });
        Schema::create('legal_policies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('body');
        });
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('banner');
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_category_id')->default(0);
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('banner');
            $table->string('tags');
            $table->string('demo_url');
            $table->string('regular_price')->default(0);
            $table->string('extend_price')->default(0);
            $table->string('is_regular_price')->default(0);
            $table->string('is_extend_price')->default(0);
            $table->string('regular_discount',2)->default(0);
            $table->string('extend_discount',2)->default(0);
            $table->integer('created_by')->default(0);
            $table->timestamps();
        });
        Schema::create('product_files', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->default(0);
            $table->string('files');
            $table->string('is_extend')->default(0);
            $table->timestamps();
        });
        Schema::create('product_galleries', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->default(0);
            $table->string('photo');
        });
    }
    public function down()
    {
        Schema::dropIfExists('banks');
        Schema::dropIfExists('days');
        Schema::dropIfExists('isic_types');
        Schema::dropIfExists('isics');
        Schema::dropIfExists('legal_doc_types');
        Schema::dropIfExists('legal_docs');
        Schema::dropIfExists('legal_policies');
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_files');
        Schema::dropIfExists('product_galleries');
    }
}
