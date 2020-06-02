<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 5/8/19
 * Time: 5:33 PM
 */

namespace App\Modules\Notification\Repositories;
use App\Modules\Game\Entities\Team;
use App\Modules\Notification\Entities\CustomNotification;
use Illuminate\Http\UploadedFile;

class CustomNotificationRepository implements CustomNotificationInterface
{


    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = CustomNotification::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('title', 'like', '%' . $filter['title'] . '%');
            return $query;
        })
            ->whereIn('status', $status)
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate($limit ? $limit : env('DEF_PAGE_LIMIT',9999999999));
        return $result;
    }

    public function find($id)
    {
        return CustomNotification::find($id);
    }

    public function save($data)
    {
        $data['status'] = 1;

        return CustomNotification::create($data);
    }

    public function update($id, $data)
    {
        $team = CustomNotification::find($id);

        return $team->update($data);
    }

    public function upload(UploadedFile $file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
        $file->move(public_path() . CustomNotification::COVER_IMAGE_PATH, $fileName);

        return $fileName;
    }


    public function delete($ids)
    {
        return CustomNotification::destroy($ids);
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = CustomNotification::find($id);
        $row->status = $stat;
        if ($row->save()) {
            return $this->getStatus($id);

        } else {
            return false;
        }
    }

    private function getStatus($id)
    {

        $row = CustomNotification::find($id);

        return $row->status;
    }

    public function getTitle()
    {
      return CustomNotification::pluck('team_name','id');
    }
}
