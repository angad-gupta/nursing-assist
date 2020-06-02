<?php
namespace App\Modules\Notification\Repositories;

use App\Modules\Notification\Entities\DeviceRegister;

class RegisteredDeviceRepository implements RegisteredDeviceInterface
{


    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = DeviceRegister::orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;
    }

    public function find($id)
    {
        return DeviceRegister::find($id);
    }

    public function save($data)
    {

        return DeviceRegister::create($data);
    }

    public function update($id, $data)
    {
        $device = DeviceRegister::find($id);
        $device->update($data);

        return true;
    }

    public function updateOrCreate($matchThese, $newData)
    {
        DeviceRegister::updateOrCreate($matchThese, $newData);
    }

    public function findByDeviceId($deviceId)
    {
        return DriverDevice::where('device_id', $deviceId)->get();
    }

    public function findAllDevice()
    {
        return DeviceRegister::get();
    }

    public function findDeviceByUser($userIds)
    {
        return DeviceRegister::whereIn('user_id', $userIds)->get();

    }


   public function findDeviceId($userId)
   {
       $data = DeviceRegister::where('user_id',$userId)->orderBy('created_at', 'desc')->first();
       $deviceId =$data->device_id;
       return $deviceId;
   }


}
