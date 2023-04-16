<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id',11)->nullable()->default('NULL');
            $table->string('title',100)->nullable()->default('NULL');
            $table->text('content');
            $table->datetime('created_at')->default('CURRENT_TIMESTAMP');
            $table->integer('view',11)->nullable()->default('NULL');
            $table->integer('like',11)->nullable()->default('NULL');
            $table->tinyInteger('state',1)->default('1');
            $table->primary('id');
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
        Schema::dropIfExists('posts');
    }
};
