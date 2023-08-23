<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoDumpCompaniesTableSeeder extends Seeder
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
                'about' => 'StellarTech Solutions is a cutting-edge technology company specializing in developing advanced AI-driven solutions for space exploration, satellite communication, and celestial data analysis. Our team of experts is dedicated to pushing the boundaries of space technology to unlock the mysteries of the universe.',
                'company_name' => 'StellarTech Solutions',
                'created_at' => '2023-02-26 14:40:37',
                'id' => 1,
                'logo' => 'https://placehold.co/600x400',
                'updated_at' => '2023-02-26 14:40:37',
                'user_id' => 7,
            ),
            1 => 
            array (
                'about' => 'Dive into a world of relaxation and rejuvenation with AquaGlow Lifestyle. We offer a range of innovative water-based products designed to enhance your well-being. From our soothing hydrotherapy devices to our bioluminescent home decor, AquaGlow Lifestyle brings the calming power of water and light into your everyday life.',
                'company_name' => 'AquaGlow Lifestyle',
                'created_at' => '2023-02-26 14:40:38',
                'id' => 2,
                'logo' => 'https://placehold.co/600x400',
                'updated_at' => '2023-02-26 14:40:38',
                'user_id' => 8,
            ),
            2 => 
            array (
                'about' => 'At QuantumFlora Genetics, we\'re revolutionizing agriculture through quantum biology. Our genetically modified plant varieties harness the principles of quantum mechanics to optimize photosynthesis, resulting in increased crop yields, enhanced nutrient content, and improved resistance to environmental stressors. Join us in cultivating a greener, more sustainable future.',
                'company_name' => 'QuantumFlora Genetics',
                'created_at' => '2023-02-26 14:40:38',
                'id' => 3,
                'logo' => 'https://placehold.co/600x400',
                'updated_at' => '2023-02-26 14:40:38',
                'user_id' => 9,
            ),
            3 => 
            array (
                'about' => 'SynthiPet is a leader in crafting lifelike robotic companions for those seeking the joys of pet ownership without the responsibilities. Our state-of-the-art AI-driven robots mimic the behavior and affection of real pets, providing companionship and emotional support to individuals and families, all without the need for feeding or grooming.',
                'company_name' => 'SynthiPet Companion Robotics',
                'created_at' => '2023-02-26 14:40:38',
                'id' => 4,
                'logo' => 'https://placehold.co/600x400',
                'updated_at' => '2023-02-26 14:40:38',
                'user_id' => 10,
            ),
            4 => 
            array (
                'about' => 'EchoSculpt Studios is where art and technology collide to create awe-inspiring audiovisual experiences. Our team of artists, engineers, and musicians collaborate to design immersive sound sculptures that react to both music and touch. Explore a multisensory journey that blurs the lines between sound and form, offering a new dimension to artistic expression.',
                'company_name' => 'EchoSculpt Studios',
                'created_at' => '2023-02-26 14:40:38',
                'id' => 5,
                'logo' => 'https://placehold.co/600x400',
                'updated_at' => '2023-02-26 14:40:38',
                'user_id' => 11,
            ),
        ));
        
        
    }
}