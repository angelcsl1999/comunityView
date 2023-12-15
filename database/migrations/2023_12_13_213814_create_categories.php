<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Forum\Category;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->id('cat_id');

            $table->string('cat_name', 255);

            $table->string('cat_description', 255);

            $table->timestamps();

        });

        $movie = Category::create([
            'cat_name' => "Pelicula",
            'cat_description' => "Filmografia, planos y dirección",
            ]
        );

        $serie = Category::create([
            'cat_name' => "Serie",
            'cat_description' => "Series",
            ]
        );

        $actor = Category::create([
            'cat_name' => "Actor",
            'cat_description' => "Actor",
            ]
        );

        $saga = Category::create([
            'cat_name' => "Universo cinematográfico",
            'cat_description' => "Cinematic universe",
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('categories');
    }
};
