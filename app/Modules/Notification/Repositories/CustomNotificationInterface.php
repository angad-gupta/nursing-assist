<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 5/8/19
 * Time: 3:57 PM
 */

namespace App\Modules\Notification\Repositories;
use Illuminate\Http\UploadedFile;

interface CustomNotificationInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function save($data);

    public function update($id,$role);

    public function delete($ids);

    public function upload(UploadedFile $file);

    public function changeStatus($id);

    public function getTitle();

}
