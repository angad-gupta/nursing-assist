<?php

namespace App\Modules\EmailLog\Repositories;

interface EmaillogInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function saveEmaillog($action);

  	public function getEmailLogById($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

  	public function find($id);
}