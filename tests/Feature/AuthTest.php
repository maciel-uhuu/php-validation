<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Mockery;
use Tests\TestCase;

class AuthTest extends TestCase
{
  use RefreshDatabase;

  public function test_register(): void
  {
    Http::fake([
      'https://www.google.com/recaptcha/api/siteverify' => Http::response([
        'success' => true
      ], 200)
    ]);

    $response = $this->postJson('/register', [
      'name' => 'Cool Name',
      'email' => 'cool@email.com',
      'password' => 'password',
      'password_confirmation' => 'password',
      'g-recaptcha-response' => 'fake_recaptcha_token'
    ]);

    $response->assertStatus(201);
  }

  public function test_login(): void
  {
    $user = User::factory()->create([
      'password' => Hash::make('password')
    ]);

    $response = $this->postJson('/login', [
      'email' => $user->email,
      'password' => 'password',
    ]);

    $response->assertStatus(204);
  }
}
