<?php

namespace Database\Factories;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokterFactory extends Factory
{
    /**
     * The name of the corresponding model.
     *
     * @var string
     */
    protected $model = Dokter::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'spesialis' => $this->faker->randomElement(['Umum', 'Anak', 'Gigi']),
            'no_telepon' => $this->faker->phoneNumber, // tambahkan ini jika field ada di migrasi/model
        ];
    }
}
