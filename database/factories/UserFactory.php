<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Editor;
use App\Models\Fotografer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Definisikan jumlah per role
        $roleCount = [
            'pemilik' => 1,
            'admin' => 1,
            'editor' => 10,
            'fotografer' => 10,
            'customer' => 15
        ];

        // Buat koleksi user sesuai dengan jumlah role yang ditentukan
        $userDataArray = collect($roleCount)->flatMap(function ($count, $role) {
            // Buat $count user untuk setiap role
            return collect(range(1, $count))->map(function () use ($role) {
                // Buat data user
                $userData = [
                    'name' => fake()->name(),
                    'email' => fake()->unique()->companyEmail(),
                    'alamat' => fake()->address(),
                    'avatar' => 'avatar.png',
                    'role' => $role,
                    'phone' => fake()->numerify('############'),
                    'password' => static::$password ??= Hash::make('123456'),
                ];

                // Buat user baru
                $user = User::create($userData);

                // Jika role adalah "fotografer", buat data fotografer
                if ($role === 'fotografer') {
                    Fotografer::create([
                        'id' => $user->id,
                        'email_fotografer' => $user->email,
                        'job' => 'no_order',
                    ]);
                } elseif ($role === 'editor') {
                    Editor::create([
                        'id' => $user->id,
                        'email_editor' => $user->email,
                        'job' => 'no_order',
                    ]);
                } 

                return $userData;
            });
        })->toArray(); // Mengubah koleksi menjadi array

        return $userDataArray; // Mengembalikan hasil



    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
