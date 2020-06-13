<?php

namespace App\Modules\CourseMaterial\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CourseMaterialDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
