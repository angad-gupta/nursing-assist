<?php
namespace App\Modules\Student\Repositories;

use App\Modules\Student\Entities\StudentPaymentInstallment;

class StudentPaymentInstallmentRepository implements StudentPaymentInstallmentInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = StudentPaymentInstallment::when(array_keys($filter, true), function ($query) use ($filter) {

        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function find($id)
    {
        return StudentPaymentInstallment::find($id);
    }

    public function save($data)
    {
        return StudentPaymentInstallment::create($data);
    }

    public function update($id, $data)
    {
        $Student = StudentPaymentInstallment::find($id);
        return $Student->update($data);
    }

    public function delete($id)
    {
        $Student = StudentPaymentInstallment::find($id);
        return $Student->delete();
    }

}
