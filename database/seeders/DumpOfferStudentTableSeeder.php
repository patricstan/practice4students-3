<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DumpOfferStudentTableSeeder extends Seeder
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
                'id' => 1,
                'offer_id' => 5,
                'student_id' => 1,
                'status' => 'pending',
                'created_at' => '2023-02-26 14:40:39',
                'updated_at' => '2023-02-26 14:40:39',
            ),
            1 => 
            array (
                'id' => 2,
                'offer_id' => 7,
                'student_id' => 2,
                'status' => 'rejected',
                'created_at' => '2023-02-26 14:40:40',
                'updated_at' => '2023-02-26 14:40:40',
            ),
            2 => 
            array (
                'id' => 3,
                'offer_id' => 3,
                'student_id' => 2,
                'status' => 'accepted',
                'created_at' => '2023-02-26 14:40:40',
                'updated_at' => '2023-02-26 14:40:40',
            ),
            3 => 
            array (
                'id' => 4,
                'offer_id' => 8,
                'student_id' => 4,
                'status' => 'rejected',
                'created_at' => '2023-02-26 14:40:40',
                'updated_at' => '2023-02-26 14:40:40',
            ),
            4 => 
            array (
                'id' => 5,
                'offer_id' => 5,
                'student_id' => 4,
                'status' => 'rejected',
                'created_at' => '2023-02-26 14:40:40',
                'updated_at' => '2023-02-26 14:40:40',
            ),
            5 => 
            array (
                'id' => 6,
                'offer_id' => 4,
                'student_id' => 5,
                'status' => 'rejected',
                'created_at' => '2023-02-26 14:40:40',
                'updated_at' => '2023-02-26 14:40:40',
            ),
            6 => 
            array (
                'id' => 7,
                'offer_id' => 2,
                'student_id' => 5,
                'status' => 'rejected',
                'created_at' => '2023-02-26 14:40:40',
                'updated_at' => '2023-02-26 14:40:40',
            ),
            7 => 
            array (
                'id' => 8,
                'offer_id' => 7,
                'student_id' => 1,
                'status' => 'accepted',
                'created_at' => '2023-02-26 14:40:40',
                'updated_at' => '2023-02-26 14:40:40',
            ),
            8 => 
            array (
                'id' => 9,
                'offer_id' => 2,
                'student_id' => 3,
                'status' => 'accepted',
                'created_at' => '2023-02-26 14:40:40',
                'updated_at' => '2023-02-26 14:40:40',
            ),
            9 => 
            array (
                'id' => 10,
                'offer_id' => 3,
                'student_id' => 4,
                'status' => 'rejected',
                'created_at' => '2023-02-26 14:40:40',
                'updated_at' => '2023-02-26 14:40:40',
            ),
            10 => 
            array (
                'id' => 11,
                'offer_id' => 9,
                'student_id' => 4,
                'status' => 'accepted',
                'created_at' => '2023-02-26 14:40:41',
                'updated_at' => '2023-02-26 14:40:41',
            ),
            11 => 
            array (
                'id' => 13,
                'offer_id' => 2,
                'student_id' => 5,
                'status' => 'accepted',
                'created_at' => '2023-02-26 14:40:41',
                'updated_at' => '2023-02-26 14:40:41',
            ),
            12 => 
            array (
                'id' => 14,
                'offer_id' => 9,
                'student_id' => 3,
                'status' => 'pending',
                'created_at' => '2023-02-26 14:40:41',
                'updated_at' => '2023-02-26 14:40:41',
            ),
            13 => 
            array (
                'id' => 15,
                'offer_id' => 8,
                'student_id' => 3,
                'status' => 'rejected',
                'created_at' => '2023-02-26 14:40:41',
                'updated_at' => '2023-02-26 14:40:41',
            ),
            14 => 
            array (
                'id' => 16,
                'offer_id' => 10,
                'student_id' => 5,
                'status' => 'accepted',
                'created_at' => '2023-02-26 14:40:41',
                'updated_at' => '2023-02-26 14:40:41',
            ),
            15 => 
            array (
                'id' => 17,
                'offer_id' => 1,
                'student_id' => 2,
                'status' => 'accepted',
                'created_at' => '2023-02-26 14:40:41',
                'updated_at' => '2023-02-26 14:40:41',
            ),
            16 => 
            array (
                'id' => 18,
                'offer_id' => 5,
                'student_id' => 2,
                'status' => 'accepted',
                'created_at' => '2023-02-26 14:40:41',
                'updated_at' => '2023-02-26 14:40:41',
            ),
            17 => 
            array (
                'id' => 19,
                'offer_id' => 3,
                'student_id' => 5,
                'status' => 'pending',
                'created_at' => '2023-02-26 14:40:41',
                'updated_at' => '2023-02-26 14:40:41',
            ),
            18 => 
            array (
                'id' => 26,
                'offer_id' => 1,
                'student_id' => 1,
                'status' => 'pending',
                'created_at' => '2023-03-05 08:38:58',
                'updated_at' => '2023-03-05 08:38:58',
            ),
            19 => 
            array (
                'id' => 27,
                'offer_id' => 1,
                'student_id' => 1,
                'status' => 'pending',
                'created_at' => '2023-03-05 08:39:54',
                'updated_at' => '2023-03-05 08:39:54',
            ),
            20 => 
            array (
                'id' => 29,
                'offer_id' => 3,
                'student_id' => 1,
                'status' => 'accepted',
                'created_at' => '2023-03-05 08:45:45',
                'updated_at' => '2023-03-17 16:23:52',
            ),
            21 => 
            array (
                'id' => 30,
                'offer_id' => 2,
                'student_id' => 1,
                'status' => 'pending',
                'created_at' => '2023-03-05 08:47:10',
                'updated_at' => '2023-03-05 08:47:10',
            ),
        ));
        
        
    }
}