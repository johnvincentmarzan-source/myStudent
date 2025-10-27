<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        Section::insert([
            ['sectionName' => '1st Year - A'],
            ['sectionName' => '1st Year - B'],
            ['sectionName' => '2nd Year - A'],
            ['sectionName' => '3rd Year - A'],
            ['sectionName' => '4th Year - A'],
        ]);
    }
}
