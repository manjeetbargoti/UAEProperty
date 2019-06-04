<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('property_for');
            $table->string('name', 191)->nullable();
            $table->string('url', 191)->nullable();
            $table->string('property_type')->nullable();
            $table->string('property_code')->nullable();
            $table->string('property_price')->nullable();
            $table->text('description')->nullable();
            $table->boolean('featured')->default('0');
            $table->string('property_area')->nullable();
            $table->string('property_facing')->nullable();
            $table->string('transection_type')->nullable();
            $table->string('construction_status')->nullable();
            $table->string('rooms')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('balconies')->nullable();
            $table->string('furnish_type')->nullable();
            $table->string('p_washrooms')->nullable();
            $table->string('cafeteria')->nullable();
            $table->string('property_age')->nullable();
            $table->boolean('commercial')->default('0');
            $table->string('plotno')->nullable();
            $table->string('addressline1')->nullable();
            $table->string('addressline2')->nullable();
            $table->string('locality')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('add_by')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
