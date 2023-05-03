<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CodeTrek\Entities\CodeTrekApplicant;
use Modules\CodeTrek\Entities\CodeTrekApplicantRoundDetail;

class CodeTrekApplicantRoundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = CodeTrekApplicantRoundDetail::class;

    public function definition()
    {
        return [
            'applicant_id' => CodeTrekApplicant::inRandomOrder()->first()->id,
            'feedback'=>'No',
        ];
    }
}
