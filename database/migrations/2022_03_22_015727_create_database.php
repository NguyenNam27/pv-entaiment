<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments("id");
            $table->string('name')->unique();
            $table->string('image');
            $table->string('url' );
            $table->text('description')->nullable();
            $table->tinyInteger('is_active');
            $table->timestamps();
        });
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments("id");
            $table->string('name_company');
            $table->string('budget');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address');
            $table->text('massage')->nullable();
            $table->timestamps();
        });
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments("id");
            $table->string('name');
            $table->tinyInteger('is_active');
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->increments("id");
            $table->string('title')->unique();
            $table->string('slug');
            $table->unsignedInteger('subcategories_id');
            $table->string('short_description');
            $table->string('content');
            $table->string('image');
            $table->string('key_word');
            $table->tinyInteger('is_active');
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id");
            $table->string('name')->unique();
            $table->string('slug');
            $table->unsignedInteger('subcategories_id');
            $table->string('price');
            $table->string('image');
            $table->string('short_description');
            $table->string('content');
            $table->tinyInteger('is_active');
            $table->timestamps();
            $table->foreign('subcategories_id')->references('id')->on('subcategories');
        });
        Schema::create('settings', function (Blueprint $table) {
            $table->increments("id");
            $table->string('company_name')->unique();
            $table->string('address');
            $table->string('image');
            $table->string('email')->unique();
            $table->string('hotline');
            $table->string('introduce');
            $table->tinyInteger('is_active');
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
        Schema::dropIfExists('banners');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('products');
        Schema::dropIfExists('settings');


    }
}
