<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoDumpOffersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('offers')->delete();
        
        \DB::table('offers')->insert(array (
            0 => 
            array (
                'accepted' => NULL,
                'applied' => NULL,
                'city' => 'Springfield',
                'company_id' => 1,
                'created_at' => '2023-08-01 09:00:00',
                'currency' => 'USD',
                'description' => 'Join our dynamic team of software engineers and contribute to innovative projects that shape the future of technology. We\'re looking for passionate individuals who thrive in collaborative environments and are driven to create impactful solutions.',
                'id' => 1,
                'is_available' => 1,
                'is_paid' => 1,
                'salary' => '75000',
                'skills' => '["Java", "Python", "SQL"]',
                'start_date' => '2023-08-01',
                'title' => 'Software Engineer',
                'updated_at' => '2023-08-15 14:30:00',
                'work_location' => 'office',
            ),
            1 => 
            array (
                'accepted' => NULL,
                'applied' => NULL,
                'city' => 'Greenwood',
                'company_id' => 2,
                'created_at' => '2023-08-05 11:30:00',
                'currency' => 'USD',
                'description' => 'Are you a creative marketer with a knack for storytelling? Join our marketing team to develop and execute engaging campaigns that captivate our audience and drive brand growth.',
                'id' => 2,
                'is_available' => 1,
                'is_paid' => 0,
                'salary' => '55000',
                'skills' => '["Marketing Strategy", "Social Media", "Analytics"]',
                'start_date' => '2023-09-10',
                'title' => 'Marketing Specialist',
                'updated_at' => '2023-08-20 10:15:00',
                'work_location' => 'office',
            ),
            2 => 
            array (
                'accepted' => NULL,
                'applied' => NULL,
                'city' => 'Virtual',
                'company_id' => 1,
                'created_at' => '2023-07-01 13:45:00',
                'currency' => 'USD',
                'description' => 'Dig into complex datasets and uncover valuable insights that guide business decisions. This role requires a meticulous analyst who can turn raw data into actionable recommendations.',
                'id' => 3,
                'is_available' => 0,
                'is_paid' => 1,
                'salary' => '60000',
                'skills' => '["Data Analysis", "Statistics", "Excel"]',
                'start_date' => '2023-07-15',
                'title' => 'Data Analyst',
                'updated_at' => '2023-07-20 15:20:00',
                'work_location' => 'remote',
            ),
            3 => 
            array (
                'accepted' => NULL,
                'applied' => NULL,
                'city' => 'Creativeburg',
                'company_id' => 3,
                'created_at' => '2023-08-10 08:45:00',
                'currency' => 'USD',
                'description' => 'Calling all creative minds! Join our design team to craft visually stunning assets that communicate our brand\'s story and captivate audiences across various platforms.',
                'id' => 4,
                'is_available' => 1,
                'is_paid' => 0,
                'salary' => '50000',
                'skills' => '["Adobe Creative Suite", "Illustration", "Typography"]',
                'start_date' => '2023-08-20',
                'title' => 'Graphic Designer',
                'updated_at' => '2023-08-18 12:00:00',
                'work_location' => 'office',
            ),
            4 => 
            array (
                'accepted' => NULL,
                'applied' => NULL,
                'city' => 'Prosperitytown',
                'company_id' => 1,
                'created_at' => '2023-08-12 10:30:00',
                'currency' => 'USD',
                'description' => 'Be a key player in our finance department, analyzing market trends and financial data to provide strategic insights that contribute to our company\'s growth and success.',
                'id' => 5,
                'is_available' => 1,
                'is_paid' => 1,
                'salary' => '65000',
                'skills' => '["Financial Modeling", "Budgeting", "Market Analysis"]',
                'start_date' => '2023-09-01',
                'title' => 'Financial Analyst',
                'updated_at' => '2023-08-17 14:45:00',
                'work_location' => 'office',
            ),
            5 => 
            array (
                'accepted' => NULL,
                'applied' => NULL,
                'city' => 'Innovationville',
                'company_id' => 4,
                'created_at' => '2023-07-01 09:15:00',
                'currency' => 'USD',
                'description' => 'Shape the future of our products by leading cross-functional teams through the entire product lifecycle. Your strategic vision and leadership will drive innovation and customer satisfaction.',
                'id' => 6,
                'is_available' => 0,
                'is_paid' => 1,
                'salary' => '80000',
                'skills' => '["Product Development", "Market Research", "Agile Methodology"]',
                'start_date' => '2023-07-05',
                'title' => 'Product Manager',
                'updated_at' => '2023-07-18 16:00:00',
                'work_location' => 'office',
            ),
            6 => 
            array (
                'accepted' => NULL,
                'applied' => NULL,
                'city' => 'Global Connect',
                'company_id' => 5,
                'created_at' => '2023-08-03 14:00:00',
                'currency' => 'USD',
                'description' => 'Join our dedicated customer support team and provide exceptional assistance to our clients worldwide. Your empathetic approach and quick thinking will ensure customer satisfaction.',
                'id' => 7,
                'is_available' => 1,
                'is_paid' => 0,
                'salary' => '45000',
                'skills' => '["Customer Service", "Problem Solving", "Communication"]',
                'start_date' => '2023-08-15',
                'title' => 'Customer Support Specialist',
                'updated_at' => '2023-08-16 11:30:00',
                'work_location' => 'remote',
            ),
            7 => 
            array (
                'accepted' => NULL,
                'applied' => NULL,
                'city' => 'Talentville',
                'company_id' => 2,
                'created_at' => '2023-09-01 12:30:00',
                'currency' => 'USD',
                'description' => 'Be a crucial part of our HR team, coordinating various functions to support our employees\' well-being and contribute to maintaining a positive work culture.',
                'id' => 8,
                'is_available' => 1,
                'is_paid' => 1,
                'salary' => '55000',
                'skills' => '["HR Administration", "Recruitment", "Employee Relations"]',
                'start_date' => '2023-09-20',
                'title' => 'Human Resources Coordinator',
                'updated_at' => '2023-09-10 09:45:00',
                'work_location' => 'office',
            ),
            8 => 
            array (
                'accepted' => NULL,
                'applied' => NULL,
                'city' => 'Tech Haven',
                'company_id' => 3,
                'created_at' => '2023-07-28 13:15:00',
                'currency' => 'USD',
                'description' => 'Join our IT department and provide technical support to ensure seamless operations across our company\'s technology infrastructure. Your problem-solving skills will keep our systems running smoothly.',
                'id' => 9,
                'is_available' => 1,
                'is_paid' => 0,
                'salary' => '48000',
                'skills' => '["Technical Troubleshooting", "Network Support", "Hardware Repair"]',
                'start_date' => '2023-08-10',
                'title' => 'IT Support Specialist',
                'updated_at' => '2023-08-15 16:30:00',
                'work_location' => 'office',
            ),
            9 => 
            array (
                'accepted' => NULL,
                'applied' => NULL,
                'city' => 'Citywide',
                'company_id' => 2,
                'created_at' => '2023-07-10 11:45:00',
                'currency' => 'USD',
                'description' => 'Drive revenue growth by identifying and pursuing new business opportunities. Your persuasive communication and strategic approach will help us expand our customer base.',
                'id' => 10,
                'is_available' => 1,
                'is_paid' => 1,
                'salary' => '60000',
                'skills' => '["Sales Strategy", "Negotiation", "Relationship Building"]',
                'start_date' => '2023-07-25',
                'title' => 'Sales Representative',
                'updated_at' => '2023-07-20 14:15:00',
                'work_location' => 'mixed',
            ),
        ));
        
        
    }
}