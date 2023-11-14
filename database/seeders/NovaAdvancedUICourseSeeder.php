<?php

namespace NovaAdvancedUI\Database\Seeders;

use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Domain;
use Illuminate\Database\Seeder;

class NovaAdvancedUICourseSeeder extends Seeder
{
    private static $videoIndex = 0;

    public function run(): void
    {
        $course = Course::create([
            'name' => 'Nova Advanced UI',
            'canonical' => 'nova-advanced-ui',
            'admin_name' => 'Bruno Falcao',
            // Launched testing.
            'launched_at' => now()->subHour(),
            'admin_email' => env('NOVA_ADVANCED_UI_EMAIL'),
            'twitter_handle' => env('NOVA_ADVANCED_UI_TWITTER'),
            'provider_namespace' => 'NovaAdvancedUI\\NovaAdvancedUIServiceProvider',
            'payment_provider_variant_id' => env('NOVA_ADVANCED_UI_VARIANT_ID'),
            'payment_provider_store_id' => env('NOVA_ADVANCED_UI_STORE_ID'),
            'course_price' => env('NOVA_ADVANCED_UI_PRICE'),
        ]);

        $domain = Domain::create([
            'name' => env('NOVA_ADVANCED_UI_DOMAIN'),
            'course_id' => $course->id,
        ]);
    }
}
