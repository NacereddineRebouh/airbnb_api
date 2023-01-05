<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('property_name');
            $table->string('type');
            $table->biginteger("guests", false, false);
            $table->biginteger('bathrooms', false, false);
            $table->biginteger('bedrooms', false, false);
            $table->biginteger('beds', false, false);
            $table->biginteger('long');
            $table->biginteger('lat');
            $table->string('location');
            $table->text('images');
            $table->decimal('price', 9, 2);
            $table->biginteger('distance');
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
        Schema::dropIfExists('rooms');
    }
};
