<?php


namespace Okotieno\PermissionsAndRoles\Tests\Unit;


use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Okotieno\PermissionsAndRoles\Models\Role;
use Okotieno\PermissionsAndRoles\Models\Permission;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
  use RefreshDatabase;
  use WithFaker;
  use DatabaseMigrations;

  private $user;

  protected function setUp(): void
  {
    parent::setUp();
    $email = $this->faker->email;
    $this->user = User::factory()->create(['email' => $email]);
  }

    /**
     * Test get '/api/users/auth'
     *
     * @return void
     * @group get-request
     * @group permission-roles
     * @group authentication
     *
     */
    public function testUserRolesAndPermissionsAreIncludedInApi()
    {
      $role = Role::create(['name' => 'some role']);
      Role::create(['name' => 'another role']);
      $permission = Permission::create(['name' => 'some permission']);
      Permission::create(['name' => 'another permission']);

      $role->permissions()->save($permission);
      $this->user->assignRole('some role');
      $this->actingAs($this->user, 'api')
        ->get('/api/users/auth')
        ->assertJsonFragment(['some role'])
        ->assertJsonFragment(['some permission'])
        ->assertJsonMissing(['another permission']);
    }
  }

