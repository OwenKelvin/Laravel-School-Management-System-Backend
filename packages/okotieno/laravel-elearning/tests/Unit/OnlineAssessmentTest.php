<?php

namespace Okotieno\ELearning\Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Okotieno\ELearning\Models\ELearningTopic;
use Tests\TestCase;

class OnlineAssessmentTest extends TestCase
{

  use WithFaker;
  use DatabaseTransactions;


  private $user;

  protected function setUp(): void
  {
    parent::setUp();
    $this->user = User::factory()->create(['email' => $this->faker->email]);
  }

  /**
   * User should be able to create E-Learning Online Assessment
   * @group post-request
   * @group academic
   * @group e-learning
   * @group online-assessment
   * @test
   * */
  public function unauthenticated_users_should_not_create_new_online_assessment()
  {
    $this->post('api/e-learning/course-content/topics/1/online-assessments', [])
      ->assertStatus(401);
  }

  /**
   * User without Permission should not be able to create E-Learning Online Assessment
   * @group post-request
   * @group academic
   * @group e-learning
   * @group online-assessment
   * @test
   * */
  public function test_without_permission_user_cannot_create_online_assessment()
  {
    $topic = ELearningTopic::factory()->create();
    $this->actingAs($this->user, 'api')
      ->post('api/e-learning/course-content/topics/' . $topic->id . '/online-assessments', [])
      ->assertStatus(403);
  }

  /**
   * User should be able to create E-Learning Online Assessment
   * @group post-request
   * @group academic
   * @group e-learning
   * @group online-assessment
   * @test
   * */

  public function with_permission_user_can_create_online_assessment()
  {
    $name = $this->faker->name;
    $topic = ELearningTopic::factory()->create();
    $this->user->permissions()->create(['name' => 'create online assessment']);
    $response = $this->actingAs($this->user, 'api')
      ->post('api/e-learning/course-content/topics/' . $topic->id . '/online-assessments', [
        'description' => $name
      ]);
    // echo $response->content();
    $response->assertStatus(201);
  }

}
