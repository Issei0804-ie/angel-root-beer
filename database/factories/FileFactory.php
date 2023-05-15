<?php

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        $file_path = $this->faker->word . ".md";
        $file_name = basename($file_path);
        $count = 0;
        while (Storage::exists($file_path)) {
            $file_path = $this->faker->word . ".md";
            $count++;
            if ($count > 10) {
                // throw error
                throw new Exception('FileFactory definition() failed');
            }
        }
        Storage::put($file_path, $this->faker->text);
        return [
            'file_name' => $file_name,
            'file_path' => $file_path,
        ];
    }
}
