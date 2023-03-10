<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('mainurl')->nullable();
            $table->string('email')->nullable();
            $table->text('description', 65535)->nullable();
            $table->text('seo_desc', 65535)->nullable();
            $table->string('logo')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobilephone')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->float('lat', 20, 10)->nullable();
            $table->float('lng', 20, 10)->nullable();
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
        Schema::dropIfExists('settings');
    }

}
