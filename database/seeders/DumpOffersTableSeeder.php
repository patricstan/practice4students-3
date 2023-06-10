<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DumpOffersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('offers')->delete();

        \DB::table('offers')->insert(array(
            0 =>
            array(
                'id' => 1,
                'title' => 'Miss',
                'start_date' => '2002-02-15',
                'is_paid' => 1,
                'salary' => 'ut',
                'currency' => 'UGX',
                'work_location' => 'remote',
                'city' => 'South Ford',
                'skills' => '["fugit"]',
                'description' => 'Iusto quibusdam reiciendis fuga deleniti eum quasi rerum. Asperiores ipsa vero non dolorem nulla. Culpa incidunt qui perferendis quia.',
                'applied' => NULL,
                'accepted' => NULL,
                'is_available' => 1,
                'company_id' => 5,
                'created_at' => '2023-02-26 14:40:38',
                'updated_at' => '2023-02-26 14:40:38',
            ),
            1 =>
            array(
                'id' => 2,
                'title' => 'Miss',
                'start_date' => '2013-03-08',
                'is_paid' => 0,
                'salary' => 'quia',
                'currency' => 'MAD',
                'work_location' => 'mixed',
                'city' => 'Brionnaville',
                'skills' => '["aut"]',
                'description' => 'Odit sit qui corrupti accusantium ullam. Quaerat placeat exercitationem quasi qui et.',
                'applied' => NULL,
                'accepted' => NULL,
                'is_available' => 0,
                'company_id' => 5,
                'created_at' => '2023-02-26 14:40:38',
                'updated_at' => '2023-02-26 14:40:38',
            ),
            2 =>
            array(
                'id' => 3,
                'title' => 'of_1',
                'start_date' => '1974-05-18',
                'is_paid' => 1,
                'salary' => 'ipsa',
                'currency' => 'STN',
                'work_location' => 'office',
                'city' => 'Reichertfort',
                'skills' => '["rerum"]',
                'description' => 'Esse omnis voluptas doloribus ducimus. Officiis atque suscipit rem quia eos nulla et. Et accusantium placeat iste provident magni ipsum. Enim facilis recusandae sit eligendi.',
                'applied' => NULL,
                'accepted' => NULL,
                'is_available' => 0,
                'company_id' => 1,
                'created_at' => '2023-02-26 14:40:38',
                'updated_at' => '2023-02-26 14:40:38',
            ),
            3 =>
            array(
                'id' => 4,
                'title' => 'of_2',
                'start_date' => '1973-02-27',
                'is_paid' => 0,
                'salary' => 'et',
                'currency' => 'GMD',
                'work_location' => 'remote',
                'city' => 'Rozellaborough',
                'skills' => '["officiis"]',
                'description' => 'Nam porro sint et vel vel eos voluptates. Quia suscipit amet placeat ratione enim eum nulla. Quidem vel earum nulla dolor. Praesentium et rem necessitatibus ex aut.',
                'applied' => NULL,
                'accepted' => NULL,
                'is_available' => 1,
                'company_id' => 1,
                'created_at' => '2023-02-26 14:40:38',
                'updated_at' => '2023-02-26 14:40:38',
            ),
            4 =>
            array(
                'id' => 5,
                'title' => 'Mrs.',
                'start_date' => '1972-04-04',
                'is_paid' => 1,
                'salary' => 'culpa',
                'currency' => 'UZS',
                'work_location' => 'office',
                'city' => 'West Gilberto',
                'skills' => '["eius"]',
                'description' => 'Non voluptas perferendis dolores eos. Ut quod et ullam quia. Unde atque autem rem consectetur. In quae earum fugit. Voluptatem sed dolore sed nisi facilis sunt repellat.',
                'applied' => NULL,
                'accepted' => NULL,
                'is_available' => 1,
                'company_id' => 5,
                'created_at' => '2023-02-26 14:40:39',
                'updated_at' => '2023-02-26 14:40:39',
            ),
            5 =>
            array(
                'id' => 6,
                'title' => 'Dr.',
                'start_date' => '1974-03-19',
                'is_paid' => 1,
                'salary' => 'temporibus',
                'currency' => 'SHP',
                'work_location' => 'mixed',
                'city' => 'South Pietro',
                'skills' => '["iste"]',
                'description' => 'Autem ipsam est ut vel saepe nostrum ipsam. Suscipit nulla et beatae ea. Iste tempore maxime sed dolores similique quod similique. Consectetur et voluptate qui consequatur.',
                'applied' => NULL,
                'accepted' => NULL,
                'is_available' => 0,
                'company_id' => 4,
                'created_at' => '2023-02-26 14:40:39',
                'updated_at' => '2023-02-26 14:40:39',
            ),
            6 =>
            array(
                'id' => 7,
                'title' => 'Dr.',
                'start_date' => '1979-01-21',
                'is_paid' => 0,
                'salary' => 'est',
                'currency' => 'GNF',
                'work_location' => 'remote',
                'city' => 'McKenzieport',
                'skills' => '["cupiditate"]',
                'description' => 'Et repellat et amet aut temporibus excepturi. Quod sit sed eum quisquam ratione veritatis id. Est quae sapiente et commodi omnis ut nemo corporis.',
                'applied' => NULL,
                'accepted' => NULL,
                'is_available' => 0,
                'company_id' => 4,
                'created_at' => '2023-02-26 14:40:39',
                'updated_at' => '2023-02-26 14:40:39',
            ),
            7 =>
            array(
                'id' => 8,
                'title' => 'of_3',
                'start_date' => '1971-08-12',
                'is_paid' => 1,
                'salary' => 'velit',
                'currency' => 'UGX',
                'work_location' => 'mixed',
                'city' => 'Dachfort',
                'skills' => '["illum"]',
                'description' => 'Aut in consequatur fuga dignissimos aut eligendi. Aliquam dolor in distinctio. Vitae soluta minus quia aut commodi fugit. Eveniet ducimus dignissimos dignissimos.',
                'applied' => NULL,
                'accepted' => NULL,
                'is_available' => 0,
                'company_id' => 1,
                'created_at' => '2023-02-26 14:40:39',
                'updated_at' => '2023-02-26 14:40:39',
            ),
            8 =>
            array(
                'id' => 9,
                'title' => 'Dr.',
                'start_date' => '2013-10-22',
                'is_paid' => 0,
                'salary' => 'eius',
                'currency' => 'KGS',
                'work_location' => 'office',
                'city' => 'Lake Albert',
                'skills' => '["exercitationem"]',
                'description' => 'Fugit voluptatem non accusamus velit soluta quo in. Ut temporibus atque similique harum dignissimos at.',
                'applied' => NULL,
                'accepted' => NULL,
                'is_available' => 1,
                'company_id' => 5,
                'created_at' => '2023-02-26 14:40:39',
                'updated_at' => '2023-02-26 14:40:39',
            ),
            9 =>
            array(
                'id' => 10,
                'title' => 'Dr.',
                'start_date' => '1980-11-22',
                'is_paid' => 1,
                'salary' => 'ut',
                'currency' => 'TND',
                'work_location' => 'remote',
                'city' => 'Port Alexanneberg',
                'skills' => '["quam"]',
                'description' => 'Repellendus cupiditate possimus nostrum et cum voluptate. Aut omnis et dolorem reiciendis quia fugiat dolores. Quas soluta praesentium ex.',
                'applied' => NULL,
                'accepted' => NULL,
                'is_available' => 0,
                'company_id' => 5,
                'created_at' => '2023-02-26 14:40:39',
                'updated_at' => '2023-02-26 14:40:39',
            ),
        ));
    }
}
