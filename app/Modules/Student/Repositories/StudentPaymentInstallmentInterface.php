<?php

namespace App\Modules\Student\Repositories;

interface StudentPaymentInstallmentInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function save($data);

    public function update($id, $data);

    public function delete($id);

}
