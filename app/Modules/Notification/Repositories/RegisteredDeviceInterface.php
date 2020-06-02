<?php
namespace App\Modules\Notification\Repositories;


interface RegisteredDeviceInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC']);

    public function find($id);

    public function save($data);

    public function update($id, $data);

    public function updateOrCreate($matchThese, $newData);

    public function findByDeviceId($deviceId);

    public function findDeviceByUser($userIds);

    public function findAllDevice();

    public function findDeviceId($userId);

}
