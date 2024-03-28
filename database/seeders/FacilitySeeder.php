<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        Facility::insert([
            ['name' => 'امکانات رفاهی اقامتگاه'],
            ['name' => 'لوازم خانگی'],
            ['name' => 'لوازم آشپزخانه'],
            ['name' => 'سرویس گرمایشی'],
            ['name' => 'سرویس سرمایشی'],
            ['name' => 'امکانات امنیتی اقامتگاه'],
        ]);
    }
}
