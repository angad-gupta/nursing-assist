<?php

namespace App\Modules\Dropdown\Database\Seeders;

use App\Modules\Dropdown\Entities\dropdown;
use App\Modules\Dropdown\Entities\Field;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DropdownDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        

          $field = array('User Type','Department','Designation','Blood Group','Ethnic','Religion','Current Condition State','Profession','Essential Type','Contact Category');

          $Dropvalue =array('admin','Technical','Project Manager','A+','Brahmin','Hindu','Normal','Doctor/Nurse/Paramedic','Medicine','Ambulance');


        foreach($field as $key => $value){

            $field = Field::create([
                'title' => $value,
                'slug' =>str_slug($value, '_')
            ]);

            $slug = str_slug($value, '_');

            $field_data=Field::where('slug',$slug)->first();

            dropdown::create([
                'fid' => $field_data->id,
                'dropvalue'=> $Dropvalue[$key],

            ]);

        }



    }
}
