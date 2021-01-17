<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'tanaka',
        //     'email' => 'tanaka@test.com',
        //     'password' => bcrypt('12344321'),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
        User::factory()
            ->times(2)
            ->hasAttendanceRecords(10)
            ->hasWorkTimes(1)
            ->create();
    }
}
