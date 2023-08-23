<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoDumpUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'created_at' => '2023-02-26 14:40:35',
                'email' => 'admin@admin.com',
                'email_verified_at' => '1973-08-28 16:06:41',
                'id' => 1,
                'name' => 'admin',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phone' => '918.484.8021',
                'remember_token' => '8xnKA0rNISxNxgpmfdRn2NLAijKH4842aRjVdScHuJkwAaqiDZO52AAEMRxb',
                'role' => 'faculty',
                'updated_at' => '2023-02-26 14:40:35',
            ),
            1 => 
            array (
                'created_at' => '2023-02-26 14:40:36',
                'email' => 'mona29@example.org',
                'email_verified_at' => '1980-07-22 18:03:51',
                'id' => 2,
                'name' => 'Daphnee Moore',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phone' => '+1-559-357-6758',
                'remember_token' => 'F52rrEvcQOHruWZv4mpxhWRKv5RtzYDjumgHssXrfQd11ckYve21gbR1iO5W',
                'role' => 'student',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            2 => 
            array (
                'created_at' => '2023-02-26 14:40:36',
                'email' => 'pfeffer.aidan@example.com',
                'email_verified_at' => '1995-01-22 02:38:45',
                'id' => 3,
                'name' => 'Stanford Kutch',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phone' => '878.954.4447',
                'remember_token' => 'c2pRED1ATWNsM7Q2tGsGVetAtt43W730E25A8G2jinigz4jWefM7skd0t7wv',
                'role' => 'student',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            3 => 
            array (
                'created_at' => '2023-02-26 14:40:36',
                'email' => 'cordie45@example.com',
                'email_verified_at' => '1971-04-02 12:09:54',
                'id' => 4,
                'name' => 'Dwight Schuppe',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phone' => '475-856-3723',
                'remember_token' => '7vs9Vk4UqBzoYtKHvDJr8kPOV5Hb50qwvKDQcnVwLA1iX6WR751r76JcgQJ3',
                'role' => 'student',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            4 => 
            array (
                'created_at' => '2023-02-26 14:40:36',
                'email' => 'ulices.conroy@example.org',
                'email_verified_at' => '1972-09-30 04:52:28',
                'id' => 5,
                'name' => 'Gerald Blick Jr.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phone' => '+1-352-568-2701',
                'remember_token' => 'OCWBRmBmtVso0MfaASkdNHqZTrsZhLtG5WTtfFSP32ot3eqnaTfnrCcmntpJ',
                'role' => 'student',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            5 => 
            array (
                'created_at' => '2023-02-26 14:40:36',
                'email' => 'howard16@example.net',
                'email_verified_at' => '1974-03-04 14:24:29',
                'id' => 6,
                'name' => 'Collin Von Jr.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phone' => '+1-337-309-7094',
                'remember_token' => 'dTUKsZpuH8p1u6XeUDXAqa0jbplFC3BcPAkpkkuyrdCWKwxmaufVUAuabqjl',
                'role' => 'student',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            6 => 
            array (
                'created_at' => '2023-02-26 14:40:37',
                'email' => 'cora.morar@example.net',
                'email_verified_at' => '1982-03-18 00:27:46',
                'id' => 7,
                'name' => 'Fredy Klein Sr.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phone' => '+1-423-446-5155',
                'remember_token' => 'PTUk0oif9gw7VmSPDkTcerwnsGvvCTTwcOUqlPeNydrkEdo49zu2ohNKpgJ5',
                'role' => 'company',
                'updated_at' => '2023-02-26 14:40:37',
            ),
            7 => 
            array (
                'created_at' => '2023-02-26 14:40:37',
                'email' => 'gvandervort@example.net',
                'email_verified_at' => '1972-03-15 07:37:50',
                'id' => 8,
                'name' => 'Gabriel Zulauf',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phone' => '414.997.3628',
                'remember_token' => 'P2Z6gJmaSXuqPWjm4okYbmeKjflx9KVIiMjV7rw2jR2csv3dIClUCBpBQF8S',
                'role' => 'company',
                'updated_at' => '2023-02-26 14:40:37',
            ),
            8 => 
            array (
                'created_at' => '2023-02-26 14:40:37',
                'email' => 'wiegand.terry@example.net',
                'email_verified_at' => '1979-05-05 05:14:05',
                'id' => 9,
                'name' => 'Dr. Sherwood Hickle Sr.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phone' => '+1-424-992-5831',
                'remember_token' => '61QpNhFcJ1NJ0GGGMrtVF982nXwhUCOisrC8kBs8kvjlqksy5LXfBrs9wyyC',
                'role' => 'company',
                'updated_at' => '2023-02-26 14:40:37',
            ),
            9 => 
            array (
                'created_at' => '2023-02-26 14:40:37',
                'email' => 'uwilkinson@example.org',
                'email_verified_at' => '2021-10-05 16:11:57',
                'id' => 10,
                'name' => 'Prof. Wade Murray',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone' => '(814) 346-1147',
                'remember_token' => '0965OUZlls81YwOIAf5KtJSlx3rWJtiXlTahMmxSO65m8ClVcjdQqVbgIfiW',
                'role' => 'company',
                'updated_at' => '2023-02-26 14:40:37',
            ),
            10 => 
            array (
                'created_at' => '2023-02-26 14:40:37',
                'email' => 'dorian85@example.org',
                'email_verified_at' => '1974-01-08 22:52:00',
                'id' => 11,
                'name' => 'Mrs. Roma Franecki Sr.',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phone' => '330.306.2324',
                'remember_token' => 'mhVBbVcUfqL32VhtJma5ddMEdVgmLjGWa0qCPo7DrTKvUgLG9UHWngbZeZyc',
                'role' => 'company',
                'updated_at' => '2023-02-26 14:40:37',
            ),
        ));
        
        
    }
}