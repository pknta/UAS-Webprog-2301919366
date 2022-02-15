<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $gender = new Gender;
        $gender->gender_desc = 'Female';
        $gender->save();

        $gender = new Gender;
        $gender->gender_desc = 'Male';
        $gender->save();
    }
}
