<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->insert([
            [
                'name'      =>    'СУЭК',
                'login'     =>    'Company_1',
                'Password'  =>    'Pas_1',
            ],
            [
                'name'      =>    'SNS',
                'login'     =>    'Company_2',
                'Password'  =>    'Pas_2',
            ],
            [
                'name'      =>    'Фосагро',
                'login'     =>    'Company_3',
                'Password'  =>    'Pas_3',
            ],
            [
                'name'      =>    'Major',
                'login'     =>    'Company_4',
                'Password'  =>    'Pas_4',
            ],
            [
                'name'      =>    'ЛАНИТ',
                'login'     =>    'Company_5',
                'Password'  =>    'Pas_5',
            ],
            [
                'name'      =>    'МАИР',
                'login'     =>    'Company_6',
                'Password'  =>    'Pas_6',
            ],
            [
                'name'      =>    'АСТ',
                'login'     =>    'Company_7',
                'Password'  =>    'Pas_7',
            ],
            [
                'name'      =>    'Rolsen',
                'login'     =>    'Company_8',
                'Password'  =>    'Pas_8',
            ],
            [
                'name'      =>    'Евросиб',
                'login'     =>    'Company_9',
                'Password'  =>    'Pas_9',
            ],
            [
                'name'      =>    'Морон',
                'login'     =>    'Company_10',
                'Password'  =>    'Pas_10',
            ],
        ]);
    }
}
