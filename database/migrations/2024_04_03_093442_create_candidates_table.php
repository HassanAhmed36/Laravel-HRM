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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('resume_path')->nullable();
            $table->integer('status')->default(1);
            $table->foreignId('job_id')->nullable()->constrained('jobs', 'id')->cascadeOnDelete();
            $table->timestamps();
        });
    }
    // Candidate status: 1 = In Process, 2 = Selected, 3 = Rejected, 4 = On Hold

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
