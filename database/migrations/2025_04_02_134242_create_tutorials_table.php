<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tutorials', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->text("description");
            $table->json("images")->nullable();
            $table->json("stages")->nullable();
            //meta
            $table->string("meta_title")->nullable();
            $table->text("meta_description")->nullable();
            $table->json("meta_keywords")->nullable();
            //boolean
            $table->boolean("is_active")->default(true);
            $table->boolean("is_new")->default(true);
            $table->boolean("is_popular")->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutorials');
    }
};
