<?php


namespace Okotieno\ELearning\Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Okotieno\ELearning\Models\ELearningTopic;

class ELearningTopicFactory extends Factory
{
  protected $model = ELearningTopic::class;
  public function definition()
  {
     return [
       'description' => $this->faker->sentence
     ];
  }
}
