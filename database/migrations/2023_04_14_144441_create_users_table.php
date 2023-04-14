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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->nullable()->default('NULL');
            $table->string('email',100);
            $table->string('password');
            $table->enum('role',['user','author','super user'])->default('user');
            $table->string('mac_address',17);
            $table->string('remember_token')->nullable()->default('NULL');
            $table->datetime('created_at')->default('CURRENT_TIMESTAMP');
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
        Schema::dropIfExists('users');
    }
};
