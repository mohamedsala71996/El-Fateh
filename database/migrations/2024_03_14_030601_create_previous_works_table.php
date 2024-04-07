<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviousWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_works', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('en_engineer_name');
            $table->string('en_title');
            $table->string('ar_engineer_name');
            $table->string('ar_title');
            $table->date('started_at');
            $table->date('ended_at');
            $table->text('en_description');
            $table->text('ar_description');
            $table->string('en_location');
            $table->string('ar_location');
            $table->string('en_client')->nullable();
            $table->string('ar_client')->nullable();
            $table->string('total_area')->nullable();
            $table->string('total_units')->nullable();
            $table->string('total_concrete')->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('previous_works');
    }
}
