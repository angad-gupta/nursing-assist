<?php

namespace App\Modules\Quiz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Quiz\Repositories\QuizInterface;

class QuizController extends Controller
{

    protected $quiz;
    
    public function __construct(QuizInterface $quiz)
    {
        $this->quiz = $quiz;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $course_content_id = $search['course_content_id'];
        $data['quiz'] = $this->quiz->findAll($limit= 10, $search); 
        $data['search_value']=$search;
        return view('quiz::quiz.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {  
        $data['is_edit'] = false;
        return view('quiz::quiz.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
         $data = $request->all();
         $question_type = $data['question_type'];
         try{ 

            if($question_type == 'multiple'){
                $data['correct_option'] = $data['multiple_correct_option'];
            }else{
                 $data['correct_option'] = $data['single_correct_option'];
            }
            $quizInfo = $this->quiz->save($data);
           
            alertify()->success('Quiz Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('quiz.index'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['quiz'] = $this->quiz->find($id);    
        return view('quiz::quiz.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();  //dd($data);
         $question_type = $data['question_type'];
         try{ 
             if($question_type == 'multiple'){
                $data['correct_option'] = $data['multiple_correct_option'];
            }else{
                 $data['correct_option'] = $data['single_correct_option'];
            }
            $quizInfo = $this->quiz->update($id, $data);
            
            alertify()->success('Quiz Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('quiz.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
       try{
            $this->quiz->delete($id);
            alertify()->success('Quiz Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('quiz.index'));  
    }
   
}
