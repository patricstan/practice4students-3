<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DumpUsersTableSeeder extends Seeder
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
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => '1973-08-28 16:06:41',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'faculty',
                'phone' => '918.484.8021',
                'remember_token' => 'cWWUqDsdXQ9F31DlNCQxs8wHajGcNBql7F3ULYiZP5RmsAp92MgCHGB3UlJ7',
                'created_at' => '2023-02-26 14:40:35',
                'updated_at' => '2023-02-26 14:40:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Daphnee Moore',
                'email' => 'mona29@example.org',
                'email_verified_at' => '1980-07-22 18:03:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'student',
                'phone' => '+1-559-357-6758',
                'remember_token' => 'EBq7AQUKNBCPQGaT8zysKQtJPH3E1Gckrz3UBj0KE3MC1EqvIaEse5IqeV8D',
                'created_at' => '2023-02-26 14:40:36',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Stanford Kutch',
                'email' => 'pfeffer.aidan@example.com',
                'email_verified_at' => '1995-01-22 02:38:45',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'student',
                'phone' => '878.954.4447',
                'remember_token' => '1CqfnDZCAu',
                'created_at' => '2023-02-26 14:40:36',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dwight Schuppe',
                'email' => 'cordie45@example.com',
                'email_verified_at' => '1971-04-02 12:09:54',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'student',
                'phone' => '475-856-3723',
                'remember_token' => 'CWnyh2QVtb',
                'created_at' => '2023-02-26 14:40:36',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Gerald Blick Jr.',
                'email' => 'ulices.conroy@example.org',
                'email_verified_at' => '1972-09-30 04:52:28',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'student',
                'phone' => '+1-352-568-2701',
                'remember_token' => 'Cq6ysIVdeu',
                'created_at' => '2023-02-26 14:40:36',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Collin Von Jr.',
                'email' => 'howard16@example.net',
                'email_verified_at' => '1974-03-04 14:24:29',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'student',
                'phone' => '+1-337-309-7094',
                'remember_token' => 'I6VOtpH91R',
                'created_at' => '2023-02-26 14:40:36',
                'updated_at' => '2023-02-26 14:40:36',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Fredy Klein Sr.',
                'email' => 'cora.morar@example.net',
                'email_verified_at' => '1982-03-18 00:27:46',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'company',
                'phone' => '+1-423-446-5155',
                'remember_token' => 'u9VyOYSoHWY6bSdp3tiOZiXAa1WiYvFpjDrB799XPwHA9ThYqHt6k2vWv0nb',
                'created_at' => '2023-02-26 14:40:37',
                'updated_at' => '2023-02-26 14:40:37',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Gabriel Zulauf',
                'email' => 'gvandervort@example.net',
                'email_verified_at' => '1972-03-15 07:37:50',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'company',
                'phone' => '414.997.3628',
                'remember_token' => 'PGTSvm12Yi',
                'created_at' => '2023-02-26 14:40:37',
                'updated_at' => '2023-02-26 14:40:37',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Dr. Sherwood Hickle Sr.',
                'email' => 'wiegand.terry@example.net',
                'email_verified_at' => '1979-05-05 05:14:05',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'company',
                'phone' => '+1-424-992-5831',
                'remember_token' => 'ziXnqwBgok',
                'created_at' => '2023-02-26 14:40:37',
                'updated_at' => '2023-02-26 14:40:37',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Prof. Wade Murray',
                'email' => 'uwilkinson@example.org',
                'email_verified_at' => '2021-10-05 16:11:57',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'company',
            'phone' => '(814) 346-1147',
                'remember_token' => 'uiQmepGksG',
                'created_at' => '2023-02-26 14:40:37',
                'updated_at' => '2023-02-26 14:40:37',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Mrs. Roma Franecki Sr.',
                'email' => 'dorian85@example.org',
                'email_verified_at' => '1974-01-08 22:52:00',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role' => 'company',
                'phone' => '330.306.2324',
                'remember_token' => 'cvSPqqbkHK',
                'created_at' => '2023-02-26 14:40:37',
                'updated_at' => '2023-02-26 14:40:37',
            ),
        ));
        
        
    }
}