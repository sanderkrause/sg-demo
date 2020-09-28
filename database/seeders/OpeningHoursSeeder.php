<?php

namespace Database\Seeders;

use App\Models\OpeningHour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpeningHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        Their store is open on Monday, Wednesday, and Friday from 08.00 till 16.00 hours.
        They are closed during lunch time (12.00 - 12.45).
        Every other week they are open on Saturday as well.
         */
        $table = DB::table('opening_hours');
        $table->insert([
            'weekday' => 1,
            'open' => '08:00',
            'close' => '12:00',
            'repeat' => OpeningHour::WEEKLY,
        ]);
        $table->insert([
            'weekday' => 1,
            'open' => '12:45',
            'close' => '16:00',
            'repeat' => OpeningHour::WEEKLY,
        ]);
        $table->insert([
            'weekday' => 3,
            'open' => '08:00',
            'close' => '12:00',
            'repeat' => OpeningHour::WEEKLY,
        ]);
        $table->insert([
            'weekday' => 3,
            'open' => '12:45',
            'close' => '16:00',
            'repeat' => OpeningHour::WEEKLY,
        ]);
        $table->insert([
            'weekday' => 5,
            'open' => '08:00',
            'close' => '12:00',
            'repeat' => OpeningHour::WEEKLY,
        ]);
        $table->insert([
            'weekday' => 5,
            'open' => '12:45',
            'close' => '16:00',
            'repeat' => OpeningHour::WEEKLY,
        ]);
        $table->insert([
            'weekday' => 6,
            'open' => '08:00',
            'close' => '12:00',
            'repeat' => OpeningHour::REPEAT_ODD_WEEKS,
        ]);
        $table->insert([
            'weekday' => 6,
            'open' => '12:45',
            'close' => '16:00',
            'repeat' => OpeningHour::REPEAT_ODD_WEEKS,
        ]);
    }
}
