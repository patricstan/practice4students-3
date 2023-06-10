<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DumpDocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('documents')->delete();
        
        \DB::table('documents')->insert(array (
            0 => 
            array (
                'id' => 13,
                'name' => 'Conventie Practica',
                'base_path' => '/var/www/html/storage/app/documents/ConventiePractica',
                'placeholders' => '"[\\"{{ $COM_TXTS_1 }}\\",\\"{{ $COM_TXTS_2 }}\\",\\"{{ $COM_TXTS_3 }}\\",\\"{{ $COM_TXTS_4 }}\\",\\"{{ $COM_TXTS_5 }}\\",\\"{{ $COM_TXTS_6 }}\\",\\"{{ $STU_TXTS_1 }}\\",\\"{{ $STU_TXTS_2 }}\\",\\"{{ $STU_TXTS_3 }}\\",\\"{{ $STU_TXTS_4 }}\\",\\"{{ $STU_TXTS_5 }}\\",\\"{{ $STU_TXTS_6 }}\\",\\"{{ $STU_TXTS_7 }}\\",\\"{{ $STU_TXTS_8 }}\\",\\"{{ $STU_TXTS_9 }}\\",\\"{{ $STU_TXTS_10 }}\\",\\"{{ $STU_TXTS_11 }}\\",\\"{{ $STU_TXTS_12 }}\\",\\"{{ $STU_TXTS_13 }}\\",\\"{{ $STU_DATE_1 }}\\",\\"{{ $FAC_TXTS_1 }}\\",\\"{{ $FAC_TXTS_2 }}\\",\\"{{ $FAC_TXTS_3 }}\\",\\"{{ $FAC_TXTS_4 }}\\",\\"{{ $FAC_TXTS_5 }}\\",\\"{{ $COM_TXTS_7 }}\\",\\"{{ $COM_TXTS_8 }}\\",\\"{{ $COM_TXTS_9 }}\\",\\"{{ $COM_TXTS_10 }}\\",\\"{{ $COM_TXTS_11 }}\\",\\"{{ $STU_DATE_2 }}\\",\\"{{ $FAC_DATE_1 }}\\",\\"{{ $COM_DATE_1 }}\\",\\"{{ $STU_DATE_3 }}\\",\\"{{ $FAC_SIGN_1 }}\\",\\"{{ $COM_SIGN_1 }}\\",\\"{{ $STU_SIGN_1 }}\\",\\"{{ $FAC_STAMP_1 }}\\",\\"{{ $COM_STAMP_1 }}\\"]"',
                'html_path' => '/var/www/html/storage/app/documents/ConventiePractica_no_headers',
                'type' => 'student',
                'fillable_by' => '["student", "company", "faculty"]',
                'lang' => 'ro',
                'created_at' => '2023-03-09 10:50:49',
                'updated_at' => '2023-03-09 12:58:40',
            ),
            1 => 
            array (
                'id' => 14,
                'name' => 'Raport Practica',
                'base_path' => '/var/www/html/storage/app/documents/RaportPractica',
                'placeholders' => '"[\\"{{ $STU_TXTS_1 }}\\",\\"{{ $STU_TXTS_2 }}\\",\\"{{ $STU_TXTS_3 }}\\",\\"{{ $STU_TXTS_4 }}\\",\\"{{ $STU_TXTS_5 }}\\",\\"{{ $STU_TXTS_6 }}\\",\\"{{ $STU_TXTS_7 }}\\",\\"{{ $STU_TXTS_8 }}\\",\\"{{ $STU_DATE_1 }}\\",\\"{{ $STU_DATE_2 }}\\",\\"{{ $STU_TXTL_1 }}\\",\\"{{ $STU_TXTL_2 }}\\",\\"{{ $STU_TXTL_3 }}\\",\\"{{ $STU_TXTL_4 }}\\",\\"{{ $STU_TXTL_5 }}\\",\\"{{ $STU_TXTL_6 }}\\",\\"{{ $STU_TXTL_7 }}\\"]"',
                'html_path' => '/var/www/html/storage/app/documents/RaportPractica_no_headers',
                'type' => 'student',
                'fillable_by' => '["student"]',
                'lang' => 'ro',
                'created_at' => '2023-03-09 11:15:22',
                'updated_at' => '2023-03-09 11:15:22',
            ),
            2 => 
            array (
                'id' => 15,
                'name' => 'Declaratie Proprie Raspundere',
                'base_path' => '/var/www/html/storage/app/documents/DeclaratiePePropriaRaspundere',
                'placeholders' => '"[\\"{{ $STU_TXTS_1 }}\\",\\"{{ $STU_DATE_1 }}\\",\\"{{ $STU_TXTS_2 }}\\",\\"{{ $STU_TXTS_3 }}\\",\\"{{ $STU_TXTS_4 }}\\",\\"{{ $STU_TXTS_5 }}\\",\\"{{ $STU_TXTS_6 }}\\",\\"{{ $STU_TXTS_7 }}\\",\\"{{ $STU_TXTS_8 }}\\",\\"{{ $STU_TXTS_9 }}\\",\\"{{ $STU_DATE_2 }}\\",\\"{{ $STU_SIGN_1 }}\\"]"',
                'html_path' => '/var/www/html/storage/app/documents/DeclaratiePePropriaRaspundere_no_headers',
                'type' => 'student',
                'fillable_by' => '["student"]',
                'lang' => 'ro',
                'created_at' => '2023-03-09 11:18:01',
                'updated_at' => '2023-03-09 11:18:01',
            ),
            3 => 
            array (
                'id' => 16,
                'name' => 'Acord Parteneriat',
                'base_path' => '/var/www/html/storage/app/documents/AcordParteneriat',
                'placeholders' => '"[\\"{{ $COM_TXTS_1 }}\\",\\"{{ $COM_TXTS_2 }}\\",\\"{{ $COM_TXTS_3 }}\\",\\"{{ $COM_TXTS_4 }}\\",\\"{{ $COM_TXTS_5 }}\\",\\"{{ $COM_TXTS_6 }}\\",\\"{{ $COM_TXTS_7 }}\\",\\"{{ $COM_TXTS_8 }}\\",\\"{{ $COM_TXTS_9 }}\\",\\"{{ $COM_TXTS_10 }}\\",\\"{{ $COM_TXTS_11 }}\\",\\"{{ $COM_TXTS_12 }}\\",\\"{{ $COM_TXTS_13 }}\\",\\"{{ $COM_TXTS_14 }}\\",\\"{{ $COM_TXTS_15 }}\\",\\"{{ $COM_TXTS_16 }}\\",\\"{{ $COM_TXTS_17 }}\\",\\"{{ $COM_TXTS_18 }}\\",\\"{{ $COM_TXTS_19 }}\\",\\"{{ $COM_DATE_1 }}\\",\\"{{ $COM_SIGN_1 }}\\"]"',
                'html_path' => '/var/www/html/storage/app/documents/AcordParteneriat_no_headers',
                'type' => 'company',
                'fillable_by' => '["company"]',
                'lang' => 'ro',
                'created_at' => '2023-03-09 11:25:55',
                'updated_at' => '2023-03-09 11:25:55',
            ),
            4 => 
            array (
                'id' => 17,
                'name' => 'Formular Evaluare',
                'base_path' => '/var/www/html/storage/app/documents/FormularEvaluareStagiuPractica-2',
                'placeholders' => '"[\\"{{ $TXTS_1 }}\\",\\"{{ $TXTS_2 }}\\",\\"{{ $TXTS_3 }}\\",\\"{{ $TXTS_4 }}\\",\\"{{ $TXTS_5 }}\\",\\"{{ $TXTS_6 }}\\",\\"{{ $TXTS_7 }}\\",\\"{{ $TXTS_8 }}\\",\\"{{ $DATE_1 }}\\",\\"{{ $DATE_2 }}\\",\\"{{ $TXTS_9 }}\\",\\"{{ $TXTS_10 }}\\",\\"{{ $TXTS_11 }}\\",\\"{{ $TXTS_12 }}\\",\\"{{ $TXTS_13 }}\\",\\"{{ $TXTS_14 }}\\",\\"{{ $TXTS_15 }}\\",\\"{{ $TXTS_16 }}\\",\\"{{ $TXTS_17 }}\\",\\"{{ $TXTS_18 }}\\",\\"{{ $TXTS_19 }}\\",\\"{{ $TXTS_20 }}\\",\\"{{ $TXTS_21 }}\\",\\"{{ $TXTS_22 }}\\",\\"{{ $TXTS_23 }}\\",\\"{{ $TXTS_24 }}\\",\\"{{ $TXTS_25 }}\\",\\"{{ $TXTS_26 }}\\",\\"{{ $TXTS_27 }}\\",\\"{{ $TXTS_28 }}\\",\\"{{ $TXTS_29 }}\\",\\"{{ $TXTS_30 }}\\",\\"{{ $TXTS_31 }}\\",\\"{{ $TXTS_32 }}\\",\\"{{ $TXTS_33 }}\\",\\"{{ $TXTS_34 }}\\",\\"{{ $TXTS_35 }}\\",\\"{{ $TXTS_36 }}\\",\\"{{ $TXTS_37 }}\\",\\"{{ $TXTS_38 }}\\",\\"{{ $TXTS_39 }}\\",\\"{{ $TXTS_40 }}\\",\\"{{ $TXTS_41 }}\\",\\"{{ $TXTS_42 }}\\",\\"{{ $TXTS_43 }}\\",\\"{{ $TXTS_44 }}\\",\\"{{ $TXTS_45 }}\\",\\"{{ $TXTS_46 }}\\",\\"{{ $TXTS_47 }}\\",\\"{{ $TXTS_48 }}\\",\\"{{ $TXTS_49 }}\\",\\"{{ $TXTS_50 }}\\",\\"{{ $TXTS_51 }}\\",\\"{{ $TXTS_52 }}\\",\\"{{ $TXTS_53 }}\\",\\"{{ $TXTS_54 }}\\",\\"{{ $TXTS_55 }}\\",\\"{{ $TXTS_56 }}\\",\\"{{ $TXTS_57 }}\\",\\"{{ $TXTS_58 }}\\",\\"{{ $TXTS_59 }}\\",\\"{{ $TXTS_60 }}\\",\\"{{ $TXTS_61 }}\\",\\"{{ $TXTS_62 }}\\",\\"{{ $TXTS_63 }}\\",\\"{{ $TXTS_64 }}\\",\\"{{ $TXTS_65 }}\\",\\"{{ $TXTS_66 }}\\",\\"{{ $TXTS_67 }}\\",\\"{{ $TXTS_68 }}\\",\\"{{ $TXTS_69 }}\\",\\"{{ $TXTS_70 }}\\",\\"{{ $TXTS_71 }}\\",\\"{{ $TXTS_72 }}\\",\\"{{ $TXTS_73 }}\\",\\"{{ $TXTS_74 }}\\",\\"{{ $TXTS_75 }}\\",\\"{{ $TXTS_76 }}\\",\\"{{ $TXTS_77 }}\\",\\"{{ $TXTS_78 }}\\",\\"{{ $TXTS_79 }}\\",\\"{{ $TXTS_80 }}\\",\\"{{ $TXTS_81 }}\\",\\"{{ $TXTS_82 }}\\",\\"{{ $TXTS_83 }}\\",\\"{{ $TXTS_84 }}\\",\\"{{ $TXTS_85 }}\\",\\"{{ $TXTS_86 }}\\",\\"{{ $TXTS_87 }}\\",\\"{{ $TXTS_88 }}\\",\\"{{ $TXTS_89 }}\\",\\"{{ $TXTS_90 }}\\",\\"{{ $TXTS_91 }}\\",\\"{{ $TXTS_92 }}\\",\\"{{ $TXTS_93 }}\\",\\"{{ $TXTS_94 }}\\",\\"{{ $TXTS_95 }}\\",\\"{{ $TXTS_96 }}\\",\\"{{ $TXTS_97 }}\\",\\"{{ $TXTL_1 }}\\",\\"{{ $TXTL_2 }}\\",\\"{{ $TXTS_98 }}\\",\\"{{ $SIGN_1 }}\\",\\"{{ $STAMP_1 }}\\"]"',
                'html_path' => '/var/www/html/storage/app/documents/FormularEvaluareStagiuPractica-2_no_headers',
                'type' => 'evaluation',
                'fillable_by' => '[]',
                'lang' => 'ro',
                'created_at' => '2023-03-09 12:18:38',
                'updated_at' => '2023-03-16 09:07:38',
            ),
        ));
        
        
    }
}