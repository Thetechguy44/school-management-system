<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('teachers', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id');
        $table->enum('gender', ['male', 'female', 'other'])->default('male');
        $table->string('phone');
        $table->date('dateofbirth');
        $table->string('current_address');
        $table->string('permanent_address');
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
