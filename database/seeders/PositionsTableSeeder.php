<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('positions')->insert([
            [
                'name'      =>    'Главный бухгалтер',
                'salary'    =>    250000.17,
            ],
            [
                'name'      =>    'Главный диспетчер',
                'salary'    =>    153000.57,
            ],
            [
                'name'      =>    'Главный инженер',
                'salary'    =>    257000.89,
            ],
            [
                'name'      =>    'Рядовой',
                'salary'    =>    63719.89,
            ],
            [
                'name'      =>    'Бухгалтер',
                'salary'    =>    83729.79,
            ],
            [
                'name'      =>    'Диспетчер',
                'salary'    =>    63784.49,
            ],
            [
                'name'      =>    'Инженер',
                'salary'    =>    143876.49,
            ],
            [
                'name'      =>    'Брокер',
                'salary'    =>    117548.49,
            ],
            [
                'name'      =>    'Дилер',
                'salary'    =>    89647.57,
            ],
            [
                'name'      =>    'Лаборант',
                'salary'    =>    57864.13,
            ],
            [
                'name'      =>    'Механик',
                'salary'    =>    67158.48,
            ],
        ]);
    }
}
