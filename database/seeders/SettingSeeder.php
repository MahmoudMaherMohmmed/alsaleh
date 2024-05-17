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
            'title' => ['ar' => 'إيف كلينك', 'en' => 'Eva Clinic'],
            'whatsapp_number' => '966920013504',
            'calling_number' => '966920013504',
            'info_email' => 'info@evaclinc.com',
            'support_email' => 'support@evaclinc.com',
        ]);
    }
}
