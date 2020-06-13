<?php

namespace App\Modules\CourseMaterial\Repositories;

interface CourseMaterialPlanInterface
{

    public function findAllMaterialPlan($material_detail_id, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function findMaterialPlan($id);

    public function getPlanList();

    public function saveMaterialPlan($data);

    public function saveMaterialPlanDetail($data);

    public function updateMaterialPlan($id,$data);

    public function deleteMaterialPlan($id);
    
    public function deleteMaterialPlanDetail($id);

    public function upload($filename);

    public function findMaterialPlanByDetail($detailid);

}