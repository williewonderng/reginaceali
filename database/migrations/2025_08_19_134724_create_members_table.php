<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('members', function (Blueprint $table) {
        $table->id();

        // Name fields
        $table->string('surname');
        $table->string('first_name');
        $table->string('middle_name')->nullable();

        // Personal info
        $table->date('dob')->nullable();
        $table->string('gender')->nullable();
        $table->string('nationality')->nullable();
        $table->string('state_of_origin')->nullable();
        $table->string('lga')->nullable();
        $table->string('tribe')->nullable();

        // Parish info
        $table->string('home_diocese')->nullable();
        $table->string('home_parish')->nullable();
        $table->string('last_parish_residence')->nullable();

        // Contact
        $table->text('residential_address')->nullable();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();

        // Occupation
        $table->string('occupation')->nullable();
        $table->text('business_address')->nullable();

        // Family
        $table->string('marital_status')->nullable();
        $table->string('spouse_name')->nullable();
        $table->string('spouse_phone')->nullable();

        // Next of kin
        $table->string('next_of_kin')->nullable();
        $table->string('next_of_kin_phone')->nullable();

        // Sacraments
        $table->boolean('baptism')->default(false);
        $table->boolean('communion')->default(false);
        $table->boolean('confirmation')->default(false);

        // Groups
        $table->text('groups')->nullable();
        $table->string('passport')->nullable();

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
