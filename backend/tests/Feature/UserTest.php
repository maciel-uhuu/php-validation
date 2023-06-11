<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticate_user($args = [])
    {
        $user = User::factory()->create($args);

        $token = auth()->login($user);

        return $token;
    }

    public function test_store_an_client(): void
    {
        $ramdomEmail = rand(1, 1000) . '@gmail.com';
        $ramdomDocument = rand(10000000000, 99999999999);

        $reponse = $this->post('/api/users', [
            'name' => 'Teste',
            'email' => $ramdomEmail,
            'password' => '123456',
            'type' => 0,
            'document' => $ramdomDocument,
            'phone' => '12345678910',
            'address' => 'Rua teste',
            'status' => 1,
        ]);

        $reponse->assertStatus(201);
    }
}
