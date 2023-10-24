<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Route;

class ViewMovieTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_web_movie_section_shows_correct_info()
    {
        $response = $this->get(Route::get('/movies',[MoviesController::class, 'index'])->name('movies.index'));

        $response->assertStatus(200);
        $response->assertSee('Peliculas populares');
    }
}
