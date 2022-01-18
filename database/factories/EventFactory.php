<?php

namespace Database\Factories;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;
    public function definition()
    {
        return [
            'title' =>$this->faker->title(), 
            'description' =>$this->faker->text(),
            'city' =>$this->faker->city(),
            'private'=>$this->faker->boolean(),
            'image'=>$this->faker->image()
        ];
    }
}
