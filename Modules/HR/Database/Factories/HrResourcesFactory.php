<?php

namespace Modules\HR\Database\Factories;

use App\Models\Category;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class HrResourcesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'resource_link' => $this->faker->url,
            'hr_resource_category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
