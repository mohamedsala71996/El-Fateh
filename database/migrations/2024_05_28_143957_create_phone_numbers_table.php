<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phone_numbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contactUs_id')->nullable()->constrained('contact_us')->cascadeOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->cascadeOnDelete();
            $table->string('en_title');  
            $table->string('ar_title');
            $table->string('phone_number');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE phone_numbers ADD CONSTRAINT check_contactUs_or_branch_id CHECK ((contactUs_id IS NOT NULL) OR (branch_id IS NOT NULL))');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_numbers');
    }
};
