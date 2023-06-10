<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DumpStudentPinsTableSeeder extends Seeder
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
                'id' => 1,
                'student_id' => 2,
                'pin' => 'paUs4qof',
                'created_at' => '2023-03-17 16:30:19',
                'updated_at' => '2023-03-17 16:39:16',
            ),
            1 => 
            array (
                'id' => 4,
                'student_id' => 1,
                'pin' => '7k5G4CIH',
                'created_at' => '2023-03-18 15:14:38',
                'updated_at' => '2023-03-18 15:14:38',
            ),
        ));
        
        
    }
}