<?php

namespace App\Modules\Employee\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\Employment\Traits\HtmlTableTrait;
use App\Modules\Dropdown\Repositories\DropdownInterface;
use App\Modules\Employment\Repositories\EmploymentInterface;

class EmployeeController extends Controller
{
    /**
     * contains method to return html table for employee
     */
    use HtmlTableTrait;

    /**
    * @var EmploymentInterface
    */
    private $employment, $dropdown;

    /**
    * EmployeeController constructor.
    * @param EmploymentInterface $employment
    */
    public function __construct(EmploymentInterface $employment, DropdownInterface $dropdown)
    {
        $this->dropdown = $dropdown;
        $this->employment = $employment;
    }

    /**
     * List of all employees
     */
    public function listEmployee(Request $request)
    {
        $search = $request->all();
        $data['department'] = $this->dropdown->getFieldBySlug('department');
        $data['designation'] = $this->dropdown->getFieldBySlug('designation');
        $data['branches'] = $this->dropdown->getFieldBySlug('branch');

        if (request('search') && request('search') == 'advance') {
            $data['employees'] = $this->employment->advanceSearch($limit = 50, $search);
        } else {
            $data['employees'] = $this->employment->findAll($limit = 50, $search);
        }

        return view('employee::employee.list', $data);
    }

    /**
     * employee list modal data
     * uses HtmlTableTrait to get html table data
     */
    public function view()
    {
        $employment = $this->employment;
        $employee_id = request('id');

        return $this->getEmployeeTable($employment, $employee_id);
    }

    public function print($id)
    {
        $data['employee'] = $this->employment->find($id);
        $data['country'] = $this->employment->getCountries()[$data['employee']->country_id];
        $data['maritalStatus'] = $data['employee']->martial_status ? 'Married' : 'Single'; 
        $data['familyMembers'] = $data['employee']->getFamilyMember;
        $data['gender'] = $data['employee']->gender ? 'Male' : 'Female';
        return view('employee::employee.print', $data);
    }
}
