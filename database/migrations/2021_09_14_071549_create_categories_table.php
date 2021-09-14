<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('c_name')->unique();
            $table->unsignedBigInteger('c_parent_id')->default(0);
            $table->string('c_slug')->index()->unique();
            $table->string('c_avatar')->nullable();
            $table->string('c_description')->nullable();
            $table->tinyInteger('c_hot')->default(0);
            $table->tinyInteger('c_status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
