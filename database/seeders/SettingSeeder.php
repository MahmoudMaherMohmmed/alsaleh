<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'title' => ['ar' => 'الصالح للإلكترونيات', 'en' => 'Al-Saleh Electronics'],
            'whatsapp_number' => '01021818597',
            'calling_number' => '0638361373',
            'info_email' => 'info@alsaalex.com',
            'support_email' => 'support@alsaalex.com',
        ]);
    }
}
