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
            ['name' => 'Prewedding','slug' => 'paket-prewed', 'description' => 'Sesi pemotretan sebelum pernikahan, termasuk makeup dan 20 foto editan', 'price' => 3000000,'warna' => 'info','sample' => 'prewed.jpg'],
            ['name' => 'Wedding','slug' => 'paket-wedding', 'description' => 'Paket lengkap untuk hari pernikahan', 'price' => 10000000,'warna' => 'pink','sample' => 'wedding.jpg'],
            ['name' => 'Family','slug' => 'paket-family', 'description' => 'Pemotretan keluarga dengan 15 foto editan', 'price' => 2500000,'warna' => 'waring','sample' => 'family.jpg'],
            ['name' => 'Graduate','slug' => 'paket-graduate', 'description' => 'Pemotretan untuk merayakan kelulusan dengan 10 foto editan', 'price' => 1500000,'warna' => 'primary','sample' => 'graduate.jpg'],
            ['name' => 'Group','slug' => 'paket-group', 'description' => 'Pemotretan untuk kelompok dengan 20 foto editan ', 'price' => 3500000,'warna' => 'dark','sample' => 'group.jpg'],
            ['name' => 'Couple','slug' => 'paket-couple', 'description' => 'Pemotretan untuk pasangan dengan 15 foto editan', 'price' => 2000000,'warna' => 'success','sample' => 'couple.jpg'],
            ['name' => 'Personal','slug' => 'paket-personal', 'description' => 'Pemotretan individu dengan 10 editan', 'price' => 1000000,'warna' => 'secondary','sample' => 'personal.jpg'],
        ];
        foreach ($packages as $package) {
            Paket::create($package);
        }
    }
}
