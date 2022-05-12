<?php

namespace Tests\Feature;

use App\Models\Oferta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class OfertaTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;
    /** @test  */
    public function list_of_ofertas_with_user_associated_should_be_return()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/api/ofertas/list');

        Oferta::factory(3)->create();

//        $this->assertCount(1, User::all());
        $ofertas = Oferta::has('users')
            ->with('users')->get();
        $response
            ->assertOk()
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $ofertas) =>
            $ofertas
                ->has('message')
                ->has('ofertas')
            );
    }
}
