<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoModules extends Migration
{
    
    public function up()
    {
        Schema::create('due_reminders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('todo_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0);
            $table->string('title');
            $table->timestamps();
        });
        Schema::create('todo_card_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('todo_list_id')->default(0);
            $table->string('title');
            $table->string('cover')->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->integer('due_reminder_id')->default(0)->nullable();
            $table->string('st')->nullable();
            $table->timestamps();
        });
        Schema::create('todo_card_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('todo_card_lists_id')->default(0);
            $table->longText('body')->nullable();
            $table->timestamps();
        });
        Schema::create('todo_card_attachments', function (Blueprint $table) {
            $table->id();
            $table->integer('todo_card_lists_id')->default(0);
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('due_reminders');
        Schema::dropIfExists('todo_lists');
        Schema::dropIfExists('todo_card_lists');
        Schema::dropIfExists('todo_card_activities');
        Schema::dropIfExists('todo_card_attachments');
    }
}
