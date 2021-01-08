<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwApiRequestsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sw_api_requests', function (Blueprint $table) {
            $table->id();
            $table->string('path')->index();
            $table->string('query')->index();
            $table->unsignedInteger('response_time_ms')->index();
            $table->unsignedInteger('payload_size_bytes')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sw_api_requests');
    }
}
