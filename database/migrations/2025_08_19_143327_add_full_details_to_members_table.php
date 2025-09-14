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
        Schema::table('members', function (Blueprint $table) {
            // Personal info
            if (!Schema::hasColumn('members', 'dob')) {
                $table->date('dob')->nullable();
            }
            if (!Schema::hasColumn('members', 'gender')) {
                $table->string('gender')->nullable();
            }
            if (!Schema::hasColumn('members', 'marital_status')) {
                $table->string('marital_status')->nullable();
            }

            // Contact (use residential_address for consistency)
            if (!Schema::hasColumn('members', 'residential_address')) {
                $table->text('residential_address')->nullable();
            }

            // Sacraments (use boolean for consistency)
            if (!Schema::hasColumn('members', 'baptism')) {
                $table->boolean('baptism')->default(false);
            }
            if (!Schema::hasColumn('members', 'communion')) {
                $table->boolean('communion')->default(false);
            }
            if (!Schema::hasColumn('members', 'confirmation')) {
                $table->boolean('confirmation')->default(false);
            }

            // Family
            if (!Schema::hasColumn('members', 'father_name')) {
                $table->string('father_name')->nullable();
            }
            if (!Schema::hasColumn('members', 'mother_name')) {
                $table->string('mother_name')->nullable();
            }
            if (!Schema::hasColumn('members', 'spouse_name')) {
                $table->string('spouse_name')->nullable();
            }
            if (!Schema::hasColumn('members', 'children')) {
                $table->text('children')->nullable();
            }

            // Next of kin
            if (!Schema::hasColumn('members', 'next_of_kin')) {
                $table->string('next_of_kin')->nullable();
            }
            if (!Schema::hasColumn('members', 'next_of_kin_phone')) {
                $table->string('next_of_kin_phone')->nullable();
            }

            // Occupation
            if (!Schema::hasColumn('members', 'occupation')) {
                $table->string('occupation')->nullable();
            }
            if (!Schema::hasColumn('members', 'employer')) {
                $table->string('employer')->nullable();
            }

            // Ministries & Notes
            if (!Schema::hasColumn('members', 'ministries')) {
                $table->text('ministries')->nullable();
            }
            if (!Schema::hasColumn('members', 'notes')) {
                $table->text('notes')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'dob','gender','marital_status','residential_address',
                'baptism','communion','confirmation',
                'father_name','mother_name','spouse_name','children',
                'next_of_kin','next_of_kin_phone',
                'occupation','employer','ministries','notes'
            ]);
        });
    }
};
