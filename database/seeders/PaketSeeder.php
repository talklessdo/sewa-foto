<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            ['name' => 'Prewedding', 'description' => 'Sesi pemotretan sebelum pernikahan, termasuk makeup dan 20 foto editan', 'price' => 3000000, 'duration' => 3,'warna' => 'info','sample' => 'prewed.jpg'],
            ['name' => 'Wedding', 'description' => 'Paket lengkap untuk hari pernikahan', 'price' => 10000000, 'duration' => 5,'warna' => 'pink','sample' => 'wedding.jpg'],
            ['name' => 'Family', 'description' => 'Pemotretan keluarga dengan 15 foto editan', 'price' => 2500000, 'duration' => 2,'warna' => 'waring','sample' => 'family.jpg'],
            ['name' => 'Graduate', 'description' => 'Pemotretan untuk merayakan kelulusan dengan 10 foto editan', 'price' => 1500000, 'duration' => 2,'warna' => 'primary','sample' => 'graduate.jpg'],
            ['name' => 'Group', 'description' => 'Pemotretan untuk kelompok dengan 20 foto editan ', 'price' => 3500000, 'duration' => 4,'warna' => 'dark','sample' => 'group.jpg'],
            ['name' => 'Couple', 'description' => 'Pemotretan untuk pasangan dengan 15 foto editan', 'price' => 2000000, 'duration' => 3,'warna' => 'success','sample' => 'couple.jpg'],
            ['name' => 'Personal', 'description' => 'Pemotretan individu dengan 10 editan', 'price' => 1000000, 'duration' => 1,'warna' => 'secondary','sample' => 'personal.jpg'],
        ];
        foreach ($packages as $package) {
            Paket::create($package);
        }
    }
}
