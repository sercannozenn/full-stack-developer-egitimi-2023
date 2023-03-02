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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("title", 80);
            $table->text("body");
            $table->tinyInteger("status")->default(0);
            $table->string("slug_name");
            $table->timestamps();

            $table->charset = "utf8";
            $table->collation = "utf8_general_ci";
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
