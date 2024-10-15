<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
{
    Schema::create('services', function (Blueprint $table) {
        $table->id();  // service_id
        $table->string('name');  // e.g., Wedding, Portrait
        $table->string('description')->nullable();  // Optional description
        $table->timestamps();  // Laravel's default created_at and updated_at
    });
}
    public function down()
    {
        Schema::dropIfExists('services');
    }
}