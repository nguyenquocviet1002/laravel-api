<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            ['LastName'=>"Nguyễn", 'FirstName'=>'Quốc Việt', 'Email'=>'viet@gmail.com', 'Phone'=>'0377050786'],
            ['LastName'=>"Trần", 'FirstName'=>'Thu Hà', 'Email'=>'ha@gmail.com', 'Phone'=>'0377123458']
        ];
        foreach($employees as $employee){
            \DB::table('employees')->insert($employee);
        }
    }
}
