<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoDumpStudentPinsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_pins')->delete();
        
        \DB::table('student_pins')->insert(array (
            0 => 
            array (
                'created_at' => '2023-03-17 16:30:19',
                'id' => 1,
                'pin' => 'paUs4qof',
                'student_id' => 2,
                'updated_at' => '2023-03-17 16:39:16',
            ),
            1 => 
            array (
                'created_at' => '2023-03-18 15:14:38',
                'id' => 4,
                'pin' => 'dBoMbNFM',
                'student_id' => 1,
                'updated_at' => '2023-08-23 09:01:03',
            ),
        ));
        
        
    }
}