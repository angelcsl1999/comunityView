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
            Schema::create('topics', function (Blueprint $table) {
    
                $table->id();
    
                $table->string('topic_subject', 255);
    
                $table->dateTime('topic_date');
    
                $table->integer('topic_cat')->unsigned();
    
                $table->integer('topic_by')->unsigned();
    
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
        //
        Schema::dropIfExists('topics');
    }
};
