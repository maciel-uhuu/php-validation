<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
  use RefreshDatabase;

  /**
   * A basic feature test example.
   */
  public function test_register_user(): void
  {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->postJson('/clients', [
      'name' => 'john doe',
      'email' => 'jogn@doe.com',
      'password' => 'password',
      'password_confirmation' => 'password',
    ]);

    $response->assertStatus(201);
  }

  public function test_list_users(): void
  {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->getJson('/clients');

    $response->assertStatus(200)->assertJson([
      'data' => []
    ]);
  }

  public function test_change_user_account_access(): void
  {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    $response = $this->actingAs($user1)->patchJson('/api/clients/' . $user2->id . '/change-account-access', [
      'can_access_account' => false
    ]);
    $response->assertStatus(200);

    $user2 = User::query()->where('id', '=', $user2->id)->first();

    $this->assertSame($user2->can_access_account, false);
  }

  public function test_update_user(): void
  {
    $user1 = User::factory()->create();
    $updated_name = 'Updated Name';
    $updated_email = 'updated@email.com';

    $response = $this->actingAs($user1)->putJson('clients/' . $user1->id, [
      'name' => $updated_name,
      'email' => $updated_email,
      'can_access_account' => true,
    ]);
    $response->assertStatus(200);

    $user1 = User::query()->where('id', '=', $user1->id)->first();

    $this->assertSame($user1->name, $updated_name);
    $this->assertSame($user1->email, $updated_email);
  }

  public function test_delete_user(): void
  {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $updated_name = 'Updated Name';
    $updated_email = 'updated@email.com';

    $response = $this->actingAs($user1)->deleteJson('clients/' . $user2->id);
    $response->assertStatus(200);

    $user2 = User::query()->where('id', '=', $user2->id)->first();

    $this->assertSame($user2, null);
  }
}
