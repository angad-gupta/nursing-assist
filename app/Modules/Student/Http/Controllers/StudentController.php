<?php

namespace App\Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\Student\Repositories\StudentInterface;

class StudentController extends Controller
{
    protected $StudentController;
    
    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['student'] = $this->student->findAll($limit= 50,$search);  
        return view('student::student.index',$data);
    }

    public function status(Request $request){
        $input = $request->all();
        $student_id = $input['student_id'];

        try{ 
            $studentData = array(
                'active' => $input['active']
            );

          $this->student->update($student_id, $studentData);
           
            alertify()->success('Student Status Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
         try{
            $this->student->delete($id);
             alertify()->success('Student Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('student.index'));
    }

}
