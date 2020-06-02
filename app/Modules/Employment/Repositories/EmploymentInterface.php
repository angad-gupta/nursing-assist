<?php

namespace App\Modules\Employment\Repositories;


interface EmploymentInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function advanceSearch($limit = 10, $filter = []);

    public function findArchive($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function getEmployeeByID($emp_id);
    
    public function getAllEmployeeData();
    
    public function getAll();
    
    public function getAllTechnical();
    
    public function getList();
    
    public function upload($file_name);
    
    public function uploadCitizen($file_name);
    
    public function uploadDocument($file_name);

    public function save($data);

    public function update($id,$data);

    public function delete($id);
    
    public function countTotal();
    
    public function getCountries();

    public function updateStatus($id);

    public function find($id);

    public function getEmployeeDetail($filter, $select);

    public function getEmpById($emp_id);

    public function autosearch($query);

    public function getEmployeeDetailByName($data);

    public function getEmployeeDetailByCode($data);
    public function getEmployeeByEmpID($emp_id);

    public function getLatestEmployeeID();

    public function checkEmailUnique($email);

}