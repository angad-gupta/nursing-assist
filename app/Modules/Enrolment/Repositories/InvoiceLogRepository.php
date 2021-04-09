<?php

namespace App\Modules\Enrolment\Repositories;

use App\Modules\Enrolment\Entities\InvoiceLog;
use DB;

class InvoiceLogRepository implements InvoiceLogInterface
{ 
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = InvoiceLog::when(array_keys($filter), function ($query) use ($filter) {

            if (isset($filter['status'])) {
                $query->where('status', $filter['status']);            
            }

        })
        ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function find($id)
    {
        return InvoiceLog::find($id);
    }

    public function save($data)
    {
        return InvoiceLog::create($data);
    }

    public function update($id, $data)
    {
        $result = InvoiceLog::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        return InvoiceLog::destroy($id);
    }

}
