<?php

namespace NovaAdvancedUI\Database\Seeders;

use Eduka\Cube\Models\Chapter;
use Eduka\Cube\Models\Coupon;
use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Domain;
use Eduka\Cube\Models\Series;
use Eduka\Cube\Models\Tag;
use Eduka\Cube\Models\User;
use Eduka\Cube\Models\Video;
use Illuminate\Database\Seeder;

// use NovaAdvancedUI\Database\Seeders\Country;

class NovaAdvancedUICourseSeeder extends Seeder
{
    private static $videoIndex = 0;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Create the Mastering Nova course data. At the moment, this course
         * is created under the eduka framework because it's a course that
         * is already live. So, here lives the data migration logic, from the
         * current live course to the eduka course instance.
         */
        $course = Course::create([
            'name' => 'Mastering Nova',
            'admin_name' => 'Bruno Falcao',
            'admin_email' => env('MASTERING_NOVA_EMAIL'),
            'twitter_handle' => env('MASTERING_NOVA_TWITTER'),
            'provider_namespace' => 'NovaAdvancedUI\\NovaAdvancedUIServiceProvider',
        ]);

        $domain = Domain::create([
            'name' => env('MASTERINGNOVA_DOMAIN'),
            'course_id' => $course->id,
        ]);

        // Check if the course exists or not.
        // The InitialSchemaSeeder should create the course during migration by default.
        $course = Course::where('name', 'Mastering Nova')->first();

        if (! $course) {
            $course = Course::factory()->count(1)->create()->first();

            Domain::factory()->count(1)->create([
                'name' => env('MASTERINGNOVA_DOMAIN'),
                'course_id' => $course->id,
            ]);
        }

        $users = User::factory()
            ->count(400)
            ->create();

        // Next we create the chapters for that course.
        // Each chapter has videos associated with it.
        // We are randomly creating 5 to 10 videos per chapter.
        $chapters = Chapter::factory()
            ->count(5)
            ->hasAttached(
                Video::factory()->count(fake()->numberBetween(5, 10)),
                // @TODO videoIndex++ not incrementing, it sits at zero for all
                ['index' => self::$videoIndex++],
            )
            ->create(['course_id' => $course->id]);

        $serieses = Series::factory()
            ->count(5)
            ->has(
                Video::factory()->count(fake()->numberBetween(5, 10)),
            )
            ->create(['course_id' => $course->id]);

        // $tags = Tag::factory()
        //     ->count(10)
        //     ->create(['course_id' => $course->id]);

        // // create country coupons
        // $this->createCouponsForPurchasePowerParity($course->id);
    }

    private function createCouponsForPurchasePowerParity(int $courseId)
    {
        $data = [];

        $coupon = new Coupon();

        foreach (Country::list() as $iso => $countryName) {
            $data[] = [
                'code' => $coupon->generateCodeForCountry($countryName, $iso),
                'is_flat_discount' => false,
                'discount_amount' => 30, // @todo change here
                'country_iso_code' => strtoupper($iso),
                'course_id' => $courseId,
            ];
        }

        Coupon::insert($data);
    }
}
