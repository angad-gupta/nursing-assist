<?php
namespace App\Modules\Student\Repositories;

use App\Modules\Student\Entities\Student;
use App\Modules\Student\Entities\StudentPayment;

class StudentPaymentRepository implements StudentPaymentInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = StudentPayment::when(array_keys($filter, true), function ($query) use ($filter) {

        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function find($id)
    {
        return StudentPayment::find($id);
    }

    public function getList()
    {
        $team = StudentPayment::pluck('company_name', 'id');
        return $team;
    }

    public function save($data)
    {
        return StudentPayment::create($data);
    }

    public function update($id, $data)
    {
        $Student = StudentPayment::find($id);
        return $Student->update($data);
    }

    public function delete($id)
    {
        $Student = StudentPayment::find($id);
        return $Student->delete();
    }

    public function upload($file)
    {

        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . StudentPayment::FILE_PATH, $fileName);

        return $fileName;
    }

    public function getInstallmentPayment($filter = [])
    {
        $result = StudentPayment::where('moved_to_student', 1)
            ->where(function ($query) {
                $query->where('status', 'First Installment Paid');
                $query->orWhere('status', 'Second Installment Paid');
            })
            ->orderBy('id', 'ASC')
            ->get();

        return $result;

    }
}
