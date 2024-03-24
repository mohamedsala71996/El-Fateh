<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->text('en_request_content');
            $table->timestamp('en_completion_date')->nullable();
            $table->string('en_request_type');
            $table->string('ar_request_type');
            $table->string('request_status');
            $table->timestamp('ar_completion_date')->nullable();
            $table->text('ar_request_content')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('previous_work_id')->constrained('previous_works');
            $table->foreignId('category_id')->constrained('categories');
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
        Schema::dropIfExists('requests');
    }
}
