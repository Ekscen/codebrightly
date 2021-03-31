<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employees')->insert([
            [
                'name'          =>  'Жуков',
                'company_id'    =>  1,
                'position_id'   =>  1,
            ],
            [
                'name'          =>  'Никифорова',
                'company_id'    =>  1,
                'position_id'   =>  3,
            ],
            [
                'name'          =>  'Губский',
                'company_id'    =>  1,
                'position_id'   =>  6,
            ],
            [
                'name'          =>  'Губская',
                'company_id'    =>  1,
                'position_id'   =>  4,
            ],
            [
                'name'          =>  'Сухорученко',
                'company_id'    =>  1,
                'position_id'   =>  7,
            ],
            [
                'name'          =>  'Черноволос',
                'company_id'    =>  1,
                'position_id'   =>  5,
            ],
            [
                'name'          =>  'Жуковец',
                'company_id'    =>  1,
                'position_id'   =>  2,
            ],
            [
                'name'          =>  'Петренко',
                'company_id'    =>  2,
                'position_id'   =>  2,
            ],
            [
                'name'          =>  'Сергеенко',
                'company_id'    =>  2,
                'position_id'   =>  1,
            ],
            [
                'name'          =>  'Мытченко',
                'company_id'    =>  2,
                'position_id'   =>  6,
            ],
            [
                'name'          =>  'Пользак',
                'company_id'    =>  2,
                'position_id'   =>  9,
            ],
            [
                'name'          =>  'Коновалова',
                'company_id'    =>  2,
                'position_id'   =>  4,
            ],
            [
                'name'          =>  'Картошкина',
                'company_id'    =>  2,
                'position_id'   =>  5,
            ],
            [
                'name'          =>  'Колобанов',
                'company_id'    =>  3,
                'position_id'   =>  1,
            ],
            [
                'name'          =>  'Константинов',
                'company_id'    =>  3,
                'position_id'   =>  2,
            ],
            [
                'name'          =>  'Головарев',
                'company_id'    =>  3,
                'position_id'   =>  3,
            ],
            [
                'name'          =>  'Хронорев',
                'company_id'    =>  3,
                'position_id'   =>  4,
            ],
            [
                'name'          =>  'Послеголов',
                'company_id'    =>  3,
                'position_id'   =>  5,
            ],
            [
                'name'          =>  'Водонаева',
                'company_id'    =>  3,
                'position_id'   =>  6,
            ],
            [
                'name'          =>  'Домодедов',
                'company_id'    =>  3,
                'position_id'   =>  7,
            ],
            [
                'name'          =>  'Корифанов',
                'company_id'    =>  3,
                'position_id'   =>  8,
            ],
            [
                'name'          =>  'Коновалов',
                'company_id'    =>  3,
                'position_id'   =>  9,
            ],
            [
                'name'          =>  'Землевал',
                'company_id'    =>  3,
                'position_id'   =>  10,
            ],
            [
                'name'          =>  'Судо',
                'company_id'    =>  1,
                'position_id'   =>  4,
            ],
            [
                'name'          =>  'Конник',
                'company_id'    =>  1,
                'position_id'   =>  5,
            ],
            [
                'name'          =>  'Третьяков',
                'company_id'    =>  1,
                'position_id'   =>  6,
            ],
            [
                'name'          =>  'Воркунов',
                'company_id'    =>  1,
                'position_id'   =>  7,
            ],
            [
                'name'          =>  'Дамагаров',
                'company_id'    =>  1,
                'position_id'   =>  8,
            ],
        ]);
    }
}
