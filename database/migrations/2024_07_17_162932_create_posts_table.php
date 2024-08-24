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
            $table->string('name',500)->unique('name');
            $table->string('slug',500);
            $table->string('short_content',200)->nullable();
            $table->string('thumbnail',200)->nullable();
            $table->longText('content')->nullable();
            $table->integer('status')->default('pending');
            $table->integer('rank')->default(1);
            $table->integer('views')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->unsignedBigInteger('id_category');
            // $table->foreign('id_category')->references('id')->on('categories');

            $table->string('meta_keyword',200)->nullable();
            $table->string('meta_title',60)->nullable();
            $table->string('meta_description',160)->nullable();
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