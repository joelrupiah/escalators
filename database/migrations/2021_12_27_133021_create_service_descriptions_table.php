<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_descriptions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('service_id')->nullable();
            
            $table->string('imageOne')->nullable();
            $table->longText('mainDescription')->nullable();

            $table->longText('mainDescriptionOne')->nullable();
            $table->string('imageTwo')->nullable();
            $table->string('pointOne')->nullable();
            $table->string('pointTwo')->nullable();
            $table->string('pointThree')->nullable();
            $table->string('pointFour')->nullable();

            $table->longText('mainDescriptionTwo')->nullable();

            $table->string('smallDescriptionOne')->nullable();
            $table->string('smallHeaderOne')->nullable();
            $table->string('smallHeaderTwo')->nullable();
            $table->string('smallHeaderThree')->nullable();
            $table->text('smallDescOne')->nullable();
            $table->text('smallDescTwo')->nullable();
            $table->text('smallDescThree')->nullable();

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
        Schema::dropIfExists('service_descriptions');
    }
}
