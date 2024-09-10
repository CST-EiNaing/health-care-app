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
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->integer('township_id');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('nrc');
            $table->string('dob');
            $table->string('race');
            $table->string('religion');
            $table->string('maritial_status');
            $table->integer('height');
            $table->integer('weight');
            $table->string('academic');
            $table->string('certificate');
            $table->string('photo');
            $table->string('phone');
            $table->string('parent_phone');
            $table->string('address');
            $table->string('parent_address');
            $table->string('member_code');
            $table->integer('daily_fee');
            $table->integer('vip_fee');
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
        Schema::dropIfExists('nurses');
    }
};
