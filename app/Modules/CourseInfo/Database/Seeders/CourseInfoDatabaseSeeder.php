<?php

namespace App\Modules\CourseInfo\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseInfo\Entities\Month;

class CourseInfoDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $months = [
            ['name' => 'January', 'code' => 'Jan.'],
            ['name' => 'February', 'code' => 'Feb.'],
            ['name' => 'March', 'code' => 'Mar.'],
            ['name' => 'April', 'code' => 'Apr.'],
            ['name' => 'May', 'code' => 'May'],
            ['name' => 'June', 'code' => 'June'],
            ['name' => 'July', 'code' => 'July'],
            ['name' => 'August', 'code' => 'Aug.'],
            ['name' => 'September', 'code' => 'Sept.'],
            ['name' => 'October', 'code' => 'Oct.'],
            ['name' => 'November', 'code' => 'Nov.'],
            ['name' => 'December', 'code' => 'Dec.'],
        ];
        
       
       $country = Month::insert($months);
    }
}


