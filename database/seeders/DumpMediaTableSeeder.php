<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DumpMediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media')->delete();
        
        \DB::table('media')->insert(array (
            0 => 
            array (
                'id' => 1,
                'model_type' => 'App\\Models\\Student',
                'model_id' => 1,
                'uuid' => '1db716fa-055b-4237-b103-c94f4c1b9b17',
                'collection_name' => 'student_picture',
                'name' => 'blob',
                'file_name' => 'blob.svg',
                'mime_type' => 'image/svg+xml',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 786,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2023-03-05 13:22:10',
                'updated_at' => '2023-03-05 13:22:10',
            ),
            1 => 
            array (
                'id' => 2,
                'model_type' => 'App\\Models\\Company',
                'model_id' => 1,
                'uuid' => 'f0fcfb0a-a1f8-4296-b2ed-772acd1ac26c',
                'collection_name' => 'company_logos',
                'name' => 'blob',
                'file_name' => 'blob.svg',
                'mime_type' => 'image/svg+xml',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 786,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2023-03-10 09:13:45',
                'updated_at' => '2023-03-10 09:13:45',
            ),
        ));
        
        
    }
}