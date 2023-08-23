<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoDumpStudentsTableSeeder extends Seeder
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
                'about' => 'Passionate about technology and innovation. Always eager to learn and explore new horizons in the world of programming."',
                'completed_practice' => 1,
                'created_at' => '2023-08-22 10:08:36',
                'education' => '{"39c3d0b8-43a6-472d-bc2e-92e7f8eb227a": {"start_year": "2019-09-01 00:00:00", "institution": "Tech University", "specialization": "Computer Science", "graduation_year": "2023-06-30 00:00:00"}}',
                'experience' => '{"736211f8-2d77-4027-94be-2a6cc4519de8": {"company": "InnovateTech", "end_date": "2023-08-15 00:00:00", "position": "Software Engineer", "start_date": "2023-02-15 00:00:00", "description": "Developed cutting-edge software solutions using Python and ML techniques.", "currently_working": 1}}',
                'foreign_languages' => '["English"]',
                'hobbies' => '["Reading", "Coding"]',
                'id' => 1,
                'last_year_grade' => '4',
                'projects' => '{"ca516a04-feff-4e7d-aa79-9aa813436dd3": {"title": "Image Recognition Project", "end_date": "2023-07-31 00:00:00", "completed": 1, "start_date": "2023-04-01 00:00:00", "description": "Implemented an image recognition model using TensorFlow and achieved 90% accuracy."}}',
                'skills' => '["Python", "JavaScript", "Machine Learning"]',
                'specialization' => 'Computer Science',
                'updated_at' => '2023-08-22 16:06:53',
                'user_id' => 2,
            ),
            1 => 
            array (
                'about' => 'Enthusiastic marketer with a creative flair. Experienced in crafting compelling campaigns that resonate with target audiences."',
                'completed_practice' => 0,
                'created_at' => '2023-02-26 14:40:36',
                'education' => '{"f126ec06-94b2-4863-a8ba-b6b3b6d69682": {"start_year": "2018-09-01 00:00:00", "institution": "Business School", "specialization": "Marketing", "graduation_year": "2022-06-30 00:00:00"}}',
                'experience' => '{"53e6537a-c7a0-45ee-9870-af368e4f3878": {"company": "DigitalImpact", "end_date": "2023-06-30 00:00:00", "position": "Marketing Specialist", "start_date": "2023-01-15 00:00:00", "description": "Led successful social media campaigns resulting in a 20% increase in engagement.", "currently_working": 0}}',
                'foreign_languages' => '["Spanish"]',
                'hobbies' => '["Painting", "Photography"]',
                'id' => 2,
                'last_year_grade' => '3',
                'projects' => '{"f04d1216-b335-4205-9891-228bf418a32f": {"title": "Product Launch Campaign", "end_date": "2023-05-31 00:00:00", "completed": 1, "start_date": "2023-03-01 00:00:00", "description": "Managed a cross-channel campaign for a new product launch, driving a 15% increase in sales."}}',
                'skills' => '["Marketing Strategy", "Content Creation", "Social Media Management"]',
                'specialization' => 'Marketing',
                'updated_at' => '2023-08-22 16:07:25',
                'user_id' => 3,
            ),
            2 => 
            array (
                'about' => 'Passionate about analyzing economic trends and making data-driven decisions. Committed to lifelong learning and professional growth."',
                'completed_practice' => 0,
                'created_at' => '2023-02-26 14:40:36',
                'education' => '{"3dbbbca6-d4ed-4294-b00a-0604d4165c65": {"start_year": "2017-09-01 00:00:00", "institution": "Economics University", "specialization": "Economics", "graduation_year": "2021-06-30 00:00:00"}}',
                'experience' => '{"e7a491d8-5fdf-483d-a225-ce3277b3ffd0": {"company": "EconInsights", "end_date": "2023-07-15 00:00:00", "position": "Economic Analyst", "start_date": "2022-01-10 00:00:00", "description": "Conducted comprehensive economic analysis and produced reports for clients.", "currently_working": 1}}',
                'foreign_languages' => '["French"]',
                'hobbies' => '["Chess", "Hiking"]',
                'id' => 3,
                'last_year_grade' => '4',
                'projects' => '{"6a5ffb66-80fe-407f-a6e0-98d582f93eb9": {"title": "Market Demand Forecast", "end_date": "2023-06-15 00:00:00", "completed": 1, "start_date": "2023-02-01 00:00:00", "description": "Developed a predictive model for market demand, resulting in a 95% accuracy rate."}}',
                'skills' => '["Data Analysis", "Econometrics", "Statistical Modeling"]',
                'specialization' => 'Economics',
                'updated_at' => '2023-08-22 16:08:14',
                'user_id' => 4,
            ),
            3 => 
            array (
                'about' => 'Passionate about designing and building innovative solutions. Skilled in CAD software and hands-on prototyping."',
                'completed_practice' => 0,
                'created_at' => '2023-02-26 14:40:36',
                'education' => '{"95fddc41-124e-4f10-b6e5-6e2de7fee82c": {"start_year": "2019-09-01 00:00:00", "institution": "Engineering Institute", "specialization": "Mechanical Engineering", "graduation_year": "2023-06-30 00:00:00"}}',
                'experience' => '{"0d97849b-1f44-45e2-88c8-0f3717f49a6a": {"company": "InnovateMech", "end_date": "2023-08-01 00:00:00", "position": "Mechanical Engineer", "start_date": "2023-03-01 00:00:00", "description": "Designed and optimized mechanical components for various projects.", "currently_working": 1}}',
                'foreign_languages' => '["German"]',
                'hobbies' => '["Gardening", "DIY Projects"]',
                'id' => 4,
                'last_year_grade' => '3',
                'projects' => '{"c78894ac-2e6e-4e2d-8355-eafe3bbf23ab": {"title": "Automated Assembly Line", "end_date": "2023-07-15 00:00:00", "completed": 1, "start_date": "2023-04-01 00:00:00", "description": "Led a team to develop an automated assembly line, improving production efficiency by 30%."}}',
                'skills' => '["CAD Design", "Prototyping", "Mechanical Engineering"]',
                'specialization' => 'Engineering',
                'updated_at' => '2023-08-22 16:08:54',
                'user_id' => 5,
            ),
            4 => 
            array (
                'about' => 'Analytical thinker with a strong foundation in finance principles. Experienced in financial modeling and risk assessment."',
                'completed_practice' => 0,
                'created_at' => '2023-02-26 14:40:37',
                'education' => '{"93b13666-329b-4712-862b-a3ae1ddf8c91": {"start_year": "2018-09-01 00:00:00", "institution": "Finance School", "specialization": "Finance", "graduation_year": "2022-06-30 00:00:00"}}',
                'experience' => '{"8c46e238-0704-4466-8f28-160e40b48e22": {"company": "InvestmentFin", "end_date": "2023-07-31 00:00:00", "position": "Financial Analyst", "start_date": "2023-01-15 00:00:00", "description": "Conducted financial analysis and provided recommendations for investment decisions.", "currently_working": 0}}',
                'foreign_languages' => '["Spanish"]',
                'hobbies' => '["Cooking", "Soccer"]',
                'id' => 5,
                'last_year_grade' => '4',
                'projects' => '{"50998383-ffc8-4bea-9ae0-460e657268ab": {"title": "Portfolio Optimization", "end_date": "2023-06-30 00:00:00", "completed": 1, "start_date": "2023-04-01 00:00:00", "description": "Developed an algorithm for portfolio optimization, resulting in a 15% increase in returns."}}',
                'skills' => '["Financial Analysis", "Risk Management", "Investment Strategies"]',
                'specialization' => 'Finance',
                'updated_at' => '2023-08-22 16:09:32',
                'user_id' => 6,
            ),
        ));
        
        
    }
}