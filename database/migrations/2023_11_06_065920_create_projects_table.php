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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('techinical')->nullable();
            $table->string('size')->nullable();
            $table->string('customer')->nullable();
            $table->date('openDate')->nullable();
            $table->date('closeDate')->nullable();
            $table->string('owner')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
