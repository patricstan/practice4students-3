<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoDumpOfferStudentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('offer_student')->delete();
        
        \DB::table('offer_student')->insert(array (
            0 => 
            array (
                'created_at' => '2023-02-26 14:40:39',
                'id' => 1,
                'offer_id' => 5,
                'status' => 'accepted',
                'student_id' => 1,
                'updated_at' => '2023-08-23 08:59:59',
            ),
            1 => 
            array (
                'created_at' => '2023-02-26 14:40:40',
                'id' => 2,
                'offer_id' => 7,
                'status' => 'rejected',
                'student_id' => 2,
                'updated_at' => '2023-02-26 14:40:40',
            ),
            2 => 
            array (
                'created_at' => '2023-02-26 14:40:40',
                'id' => 3,
                'offer_id' => 3,
                'status' => 'accepted',
                'student_id' => 2,
                'updated_at' => '2023-02-26 14:40:40',
            ),
            3 => 
            array (
                'created_at' => '2023-02-26 14:40:40',
                'id' => 4,
                'offer_id' => 8,
                'status' => 'rejected',
                'student_id' => 4,
                'updated_at' => '2023-02-26 14:40:40',
            ),
            4 => 
            array (
                'created_at' => '2023-02-26 14:40:40',
                'id' => 5,
                'offer_id' => 5,
                'status' => 'rejected',
                'student_id' => 4,
                'updated_at' => '2023-02-26 14:40:40',
            ),
            5 => 
            array (
                'created_at' => '2023-02-26 14:40:40',
                'id' => 6,
                'offer_id' => 4,
                'status' => 'rejected',
                'student_id' => 5,
                'updated_at' => '2023-02-26 14:40:40',
            ),
            6 => 
            array (
                'created_at' => '2023-02-26 14:40:40',
                'id' => 7,
                'offer_id' => 2,
                'status' => 'rejected',
                'student_id' => 5,
                'updated_at' => '2023-02-26 14:40:40',
            ),
            7 => 
            array (
                'created_at' => '2023-02-26 14:40:40',
                'id' => 8,
                'offer_id' => 7,
                'status' => 'accepted',
                'student_id' => 1,
                'updated_at' => '2023-02-26 14:40:40',
            ),
            8 => 
            array (
                'created_at' => '2023-02-26 14:40:40',
                'id' => 9,
                'offer_id' => 2,
                'status' => 'accepted',
                'student_id' => 3,
                'updated_at' => '2023-02-26 14:40:40',
            ),
            9 => 
            array (
                'created_at' => '2023-02-26 14:40:40',
                'id' => 10,
                'offer_id' => 3,
                'status' => 'rejected',
                'student_id' => 4,
                'updated_at' => '2023-02-26 14:40:40',
            ),
        ));
        
        
    }
}