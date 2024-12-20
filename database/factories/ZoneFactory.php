<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use App\Enums\ZoneTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zone>
 */
class ZoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->randomElement(array_column(ZoneTypeEnum::cases(), 'value')),
            'coordinates' => $this->generatePoint(),
            'status' => StatusEnum::ACTIVE->value,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * @return string
     */
    private function generatePoint(): string
    {
        $latitude = $this->faker->latitude;
        $longitude = $this->faker->longitude;

        return "SRID=4326;POINT($longitude $latitude)";
    }
}
