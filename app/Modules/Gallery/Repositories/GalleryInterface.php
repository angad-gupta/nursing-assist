<?php

namespace App\Modules\Gallery\Repositories;


interface GalleryInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);
    
    public function save($data);

    public function update($id,$data);

    public function delete($id);
    
    public function deleteGalleryImages($id);
    
    public function deleteById($id);

    public function countTotal();

    public function upload($file_name);

    public function uploadMultiImages($files, $key_name);

    public function getGalleryImage($id);

    public function saveGalleryImage($data);
}
