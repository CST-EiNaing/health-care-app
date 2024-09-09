<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->integer('patient_id');
            $table->integer('ndp_id');
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('service_fee');
            $table->integer('nurse_fee');
            $table->integer('total');
            $table->integer('nurse_profit');
            $table->integer('total_income');
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
