<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')
                ->references('id')
                ->on('services');

            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')
                ->references('id')
                ->on('users');

            $table->text('description')->nullable();
            $table->enum('status', ['booked', 'completed', 'canceled']);
            $table->integer('duration')->default(15);
            $table->double('price')->default(0);
            $table->timestamp('booked_at');
            $table->timestamp('finished_at')->storedAs('booked_at + INTERVAL duration MINUTE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
