<?php

namespace App\Modules\CourseMaterial\Repositories;

interface CourseMaterialDetailInterface
{


    public function findAllMaterialDetail($course_material_id, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function findMaterialDetail($id);

    public function getDetailList();

    public function saveMaterialDetail($data);

    public function saveMaterialSession($sessiondata);

    public function updateMaterialDetail($id,$data);

    public function deleteMaterialDetail($id);
    
    public function deleteMaterialSession($id);

    public function findByMaterial($detailid);
}