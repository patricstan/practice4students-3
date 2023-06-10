<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DumpStudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('students')->delete();
        
        \DB::table('students')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'specialization' => 'at T',
                'about' => 'Et ut quidem quos ducimus est ea. Fuga qui tenetur cum sed ullam ipsa. T',
                'skills' => '["et", "T"]',
                'last_year_grade' => '5 T',
                'foreign_languages' => '["doloribus", "T"]',
                'hobbies' => '["occaecati", "T"]',
                'education' => '{"2ead5b54-6419-4c06-b212-5fca8ed78996": {"start_year": "2023-03-18 00:00:00", "institution": "asd", "specialization": "asd", "graduation_year": "2023-03-09 00:00:00"}, "e5dc0226-8920-4f5e-8925-d72b24f7823f": {"start_year": "2031-03-21 00:00:00", "institution": "jjj", "specialization": "gdg", "graduation_year": "2033-03-24 00:00:00"}}',
                'experience' => '{"9fb6acf5-8847-4e0b-9862-a613cf4ca7bb": {"company": "ahsjdk", "end_date": "2023-03-15 00:00:00", "position": "CEO", "start_date": "2023-03-17 00:00:00", "description": "slkdjfk"}}',
                'projects' => '{"94d97993-1878-4296-98db-a6c39fe34a32": {"title": "HHHSHS", "end_date": "2023-03-29 00:00:00", "start_date": "2023-03-14 00:00:00", "description": "mncmnsmdc"}}',
                'completed_practice' => 1,
                'created_at' => '2023-02-26 14:40:36',
                'updated_at' => '2023-03-17 16:02:06',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'specialization' => 'accusantium',
                'about' => 'Odio voluptates molestiae consequatur sequi quae officiis. Excepturi et corporis iste. Consequuntur eveniet consequatur aut quas. Debitis fugit quis nisi id maiores.',
                'skills' => '["molestias"]',
                'last_year_grade' => '1',
                'foreign_languages' => '["commodi"]',
                'hobbies' => '["rerum"]',
                'education' => '{"2ead5b54-6419-4c06-b212-5fca8ed78996": {"start_year": "2023-03-18 00:00:00", "institution": "asd", "specialization": "asd", "graduation_year": "2023-03-09 00:00:00"}, "e5dc0226-8920-4f5e-8925-d72b24f7823f": {"start_year": "2031-03-21 00:00:00", "institution": "jjj", "specialization": "gdg", "graduation_year": "2033-03-24 00:00:00"}}',
                'experience' => '{"9fb6acf5-8847-4e0b-9862-a613cf4ca7bb": {"company": "ahsjdk", "end_date": "2023-03-15 00:00:00", "position": "CEO", "start_date": "2023-03-17 00:00:00", "description": "slkdjfk"}}',
                'projects' => '{"94d97993-1878-4296-98db-a6c39fe34a32": {"title": "HHHSHS", "end_date": "2023-03-29 00:00:00", "start_date": "2023-03-14 00:00:00", "description": "mncmnsmdc"}}',
                'completed_practice' => 0,
                'created_at' => '2023-02-26 14:40:36',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 4,
                'specialization' => 'omnis',
                'about' => 'Veniam ea vel fugiat adipisci dolorum ut et. Et omnis autem impedit ut minus omnis. Veniam molestiae porro non.',
                'skills' => '["molestias"]',
                'last_year_grade' => '3',
                'foreign_languages' => '["consequatur"]',
                'hobbies' => '["quaerat"]',
                'education' => '{"2ead5b54-6419-4c06-b212-5fca8ed78996": {"start_year": "2023-03-18 00:00:00", "institution": "asd", "specialization": "asd", "graduation_year": "2023-03-09 00:00:00"}, "e5dc0226-8920-4f5e-8925-d72b24f7823f": {"start_year": "2031-03-21 00:00:00", "institution": "jjj", "specialization": "gdg", "graduation_year": "2033-03-24 00:00:00"}}',
                'experience' => '{"9fb6acf5-8847-4e0b-9862-a613cf4ca7bb": {"company": "ahsjdk", "end_date": "2023-03-15 00:00:00", "position": "CEO", "start_date": "2023-03-17 00:00:00", "description": "slkdjfk"}}',
                'projects' => '{"94d97993-1878-4296-98db-a6c39fe34a32": {"title": "HHHSHS", "end_date": "2023-03-29 00:00:00", "start_date": "2023-03-14 00:00:00", "description": "mncmnsmdc"}}',
                'completed_practice' => 0,
                'created_at' => '2023-02-26 14:40:36',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 5,
                'specialization' => 'quod',
                'about' => 'Assumenda a aspernatur repellendus dolorem id. Reiciendis reiciendis autem consectetur ipsam voluptas. Voluptas quae qui magni aut consequatur. Itaque iusto laudantium debitis aperiam aut tempore.',
                'skills' => '["consectetur"]',
                'last_year_grade' => '7',
                'foreign_languages' => '["sit"]',
                'hobbies' => '["itaque"]',
                'education' => '{"2ead5b54-6419-4c06-b212-5fca8ed78996": {"start_year": "2023-03-18 00:00:00", "institution": "asd", "specialization": "asd", "graduation_year": "2023-03-09 00:00:00"}, "e5dc0226-8920-4f5e-8925-d72b24f7823f": {"start_year": "2031-03-21 00:00:00", "institution": "jjj", "specialization": "gdg", "graduation_year": "2033-03-24 00:00:00"}}',
                'experience' => '{"9fb6acf5-8847-4e0b-9862-a613cf4ca7bb": {"company": "ahsjdk", "end_date": "2023-03-15 00:00:00", "position": "CEO", "start_date": "2023-03-17 00:00:00", "description": "slkdjfk"}}',
                'projects' => '{"94d97993-1878-4296-98db-a6c39fe34a32": {"title": "HHHSHS", "end_date": "2023-03-29 00:00:00", "start_date": "2023-03-14 00:00:00", "description": "mncmnsmdc"}}',
                'completed_practice' => 0,
                'created_at' => '2023-02-26 14:40:36',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 6,
                'specialization' => 'facere',
                'about' => 'Earum quibusdam quo omnis facere aut. Mollitia eum vel reiciendis ut optio velit et. Error veniam quo non nam quo sint. Cupiditate modi dolorem vel magni magnam quos omnis.',
                'skills' => '["ducimus"]',
                'last_year_grade' => '5',
                'foreign_languages' => '["eos"]',
                'hobbies' => '["fugit"]',
                'education' => '{"2ead5b54-6419-4c06-b212-5fca8ed78996": {"start_year": "2023-03-18 00:00:00", "institution": "asd", "specialization": "asd", "graduation_year": "2023-03-09 00:00:00"}, "e5dc0226-8920-4f5e-8925-d72b24f7823f": {"start_year": "2031-03-21 00:00:00", "institution": "jjj", "specialization": "gdg", "graduation_year": "2033-03-24 00:00:00"}}',
                'experience' => '{"9fb6acf5-8847-4e0b-9862-a613cf4ca7bb": {"company": "ahsjdk", "end_date": "2023-03-15 00:00:00", "position": "CEO", "start_date": "2023-03-17 00:00:00", "description": "slkdjfk"}}',
                'projects' => '{"94d97993-1878-4296-98db-a6c39fe34a32": {"title": "HHHSHS", "end_date": "2023-03-29 00:00:00", "start_date": "2023-03-14 00:00:00", "description": "mncmnsmdc"}}',
                'completed_practice' => 0,
                'created_at' => '2023-02-26 14:40:37',
                'updated_at' => '2023-02-26 14:40:37',
            ),
        ));
        
        
    }
}