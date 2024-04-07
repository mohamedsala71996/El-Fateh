<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //مش مهم 
    {
        Schema::create('address', function (Blueprint $table) {
            // $table->id();
            // $table->string('en_street');
            // $table->string('en_floor')->nullable();
            // $table->string('en_flat')->nullable();
            // $table->string('en_building')->nullable();
            // $table->string('notes')->nullable();
            // $table->string('ar_building')->nullable();
            // $table->string('ar_flat')->nullable();
            // $table->string('ar_floor')->nullable();
            // $table->string('ar_street')->nullable();
            // $table->foreignId('user_id')->constrained();
            // $table->foreignId('admin_id')->constrained('admins');
            // $table->foreignId('request_id')->constrained('requests');
            // $table->foreignId('previous_work_id')->constrained('previous_works');
            // $table->timestamp('created_at')->useCurrent();
            // $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
