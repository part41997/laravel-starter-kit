<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => 'English', 'code' => 'en', 'locale' => 'en', 'flag' => 'us'],
            ['name' => 'Spanish', 'code' => 'es', 'locale' => 'es', 'flag' => 'french']
        ];

        foreach ($languages as $language) {
            Language::updateOrCreate([
                'code' => $language['code'],
                'locale' => $language['locale']
            ],[
                'name' => $language['name'],
                'locale' => $language['locale'],
                'flag' => $language['flag']
            ]);
        }
    }
}
