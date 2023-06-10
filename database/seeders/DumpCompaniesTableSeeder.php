<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DumpCompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 7,
                'company_name' => 'sed',
                'logo' => 'https://picsum.photos/200',
                'about' => 'explicabo jakshdkjashakjshdj akshdkajshakjshdajksdhakjfnvkmsnsm, dnf, smdnf, msdnf,msdnfmnasjkdakjwhdla;nasjkdna',
                'created_at' => '2023-02-26 14:40:37',
                'updated_at' => '2023-02-26 14:40:37',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 8,
                'company_name' => 'dolore',
                'logo' => 'https://picsum.photos/200',
                'about' => 'est',
                'created_at' => '2023-02-26 14:40:38',
                'updated_at' => '2023-02-26 14:40:38',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 9,
                'company_name' => 'quia',
                'logo' => 'https://picsum.photos/200',
                'about' => 'consectetur',
                'created_at' => '2023-02-26 14:40:38',
                'updated_at' => '2023-02-26 14:40:38',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 10,
                'company_name' => 'est',
                'logo' => 'https://picsum.photos/200',
                'about' => 'quae',
                'created_at' => '2023-02-26 14:40:38',
                'updated_at' => '2023-02-26 14:40:38',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 11,
                'company_name' => 'possimus',
                'logo' => 'https://picsum.photos/200',
                'about' => 'exercitationem',
                'created_at' => '2023-02-26 14:40:38',
                'updated_at' => '2023-02-26 14:40:38',
            ),
        ));
        
        
    }
}