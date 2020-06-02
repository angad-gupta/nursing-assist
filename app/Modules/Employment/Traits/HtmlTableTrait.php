<?php 

namespace App\Modules\Employment\Traits;

trait HtmlTableTrait
{
    public function getEmployeeTable($employment, $employee_id)
    {
        $employee = $employment->find($employee_id);
        $country = $employment->getCountries()[$employee->country_id];
        $maritalStatus = $employee->martial_status ? 'Married' : 'Single'; 
        $familyMembers = $employee->getFamilyMember;

        $full_name = !empty($employee->middle_name) ? $employee->first_name.' '.$employee->middle_name.' '.$employee->last_name :$employee->first_name.' '.$employee->last_name;

        $gender = $employee->gender ? 'Male' : 'Female';
        $html = '';
        $html .= "<table class='table table-striped mb30' id='table1' cellspacing='0' width='100%' frame='box'>";
        $html .= "<thead>";
        $html .= " <tr>";
        $html .= "<th width='25%'></th>";
        $html .= "<th width='25%'></th>";
        $html .= "<th width='25%'></th>";
        $html .= "<th width='25%'></th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";
        $html .= "<tr>";
        $html .= "<td colspan='4'><h3>Employee Detail</h3></td>";
        $html .= "</tr>";

        $html .= "<tr>";
        $html .= "<td class='text-success'>Employee ID : </td>";
        $html .= "<td>".$employee->employee_id."</td>";
        $html .= "</tr>";

        $html .= "<tr>";
        $html .= "<td class='text-success'>Name : </td>";
        $html .= "<td>".$full_name."</td>";
        $html .= "<td class='text-success'>Phone Number</td>";
        $html .= "<td>".$employee->phone."</td>";
        $html .= "</tr>";

        $html .= "<tr>";
        $html .= "<td class='text-success'>Mobile 1 : </td>";
        $html .= "<td>".$employee->mobile."</td>";
        $html .= "<td class='text-success'>Mobile 2</td>";
        $html .= "<td>".$employee->mobile2."</td>";
        $html .= "</tr>";

         $html .= "<tr>";
        $html .= "<td class='text-success'>Join Date : </td>";
        $html .= "<td>".$employee->join_date."</td>";
        $html .= "<td class='text-success'>Personal Email : </td>";
        $html .= "<td>".$employee->personal_email."</td>";
        $html .= "</tr>";

        $html .= "<tr>";
        $html .= "<td class='text-success'>Designation</td>";
        $html .= "<td>".$employee->designation->dropvalue."</td>";
        $html .= "<td class='text-success'>Department</td>";
        $html .= "<td>".$employee->department->dropvalue."</td>";
        $html .= "</tr>";

        $html .= "</tbody>";
        $html .= "</table>";

        $html .= "<table class='table table-striped mb30' id='table1' cellspacing='0' width='100%' frame='box'>";
        $html .= "<thead>";
        $html .= " <tr>";
        $html .= "<th width='25%'></th>";
        $html .= "<th width='25%'></th>";
        $html .= "<th width='25%'></th>";
        $html .= "<th width='25%'></th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";

        $html .= "<tr>";
        $html .= "<td colspan='4'><h3>Personal Detail</h3></td>";
        $html .= "</tr>";

        $html .= "<tr>";
        $html .= "<td class='text-success'>Gender : </td>";
        $html .= "<td>".$gender."</td>";
        $html .= "<td class='text-success'>Marital Status : </td>";
        $html .= "<td>".$maritalStatus."</td>";
        $html .= "</tr>";

        $html .= "<tr>";
        $html .= "<td class='text-success'>Date of Birth : </td>";
        $html .= "<td>".$employee->dob."</td>";
        $html .= "<td class='text-success'>Blood Group : </td>";
        $html .= "<td>".(!empty($employee->blood_group) && $employee->blood_group > 0 ? $employee->bloodtype->dropvalue : '')."</td>";
        $html .= "</tr>";

        $html .= "<tr>";
        $html .= "<td class='text-success'>Religion : </td>";
        $html .= "<td>".$employee->religion."</td>";
        $html .= "<td class='text-success'>Ethnic : </td>";
        $html .= "<td>".$employee->cast_ethnic."</td>";
        $html .= "</tr>";

        $html .= "<tr>";
        $html .= "<td class='text-success'>Country : </td>";
        $html .= "<td>".$country."</td>";
        $html .= "<td class='text-success'>Address : </td>";
        $html .= "<td>".$employee->address."</td>";
        $html .= "</tr>";


        $html .= "</tbody>";
        $html .= "</table>";

        return $html;
    }
}