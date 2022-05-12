<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /** @test  */
    public function a_user_should_be_login()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/auth/login', [
            'email' => 'test@example.com',
            'password' => 'PasswordTest'
        ]);

        $credentials = array(
            'email' => 'test@example.com',
            'password' => 'PasswordTest'
        );
        $token = JWTAuth::attempt($credentials);

//        $respuesta = json_encode(array(
//            'access_token' => $token,
//            'token_type' => 'bearer',
//            'expires_in' => ''
//        ));

        $response
            ->assertOk()
//            ->assertStatus(200 || 401)
//            ->assertJson([
//                'error' => '',
//                'access_token' => $token,
//                'token_type' => 'bearer',
//                'expires_in' => config('jwt.ttl')
//            ]);
            ->assertJson(fn (AssertableJson $respuesta) =>
            $respuesta
                ->has('error')
                ->has('access_token')
                ->has('token_type')
                ->has('expires_in')
            );
    }
}
