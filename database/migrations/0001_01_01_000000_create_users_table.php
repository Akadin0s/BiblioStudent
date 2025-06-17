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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->nullable();
            $table->timestamps();  
        });
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        Schema::create('school_details', function (Blueprint $table) {                     
            $table->string('name_school');
            $table->string('address_school');
            $table->string('email_school')->unique();
            $table->string('phone_school');
            $table->string('website_school');
            $table->text('description_school');
            $table->string('image_path');
            $table->timestamps();
        });
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name_language')->unique();
            $table->string('title_language');
            $table->text('description_language');   
            $table->string('image_path');
            $table->timestamps();
        });
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name_document');
            $table->text('description_document');
            $table->string('file_document');
            $table->string('niveau_document');
            $table->string('language');
            $table->foreign('language')->references('name_language')->on('languages')->onDelete('cascade'); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('teacher_details');
        Schema::dropIfExists('school_details');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('documents');
    
    }
};
