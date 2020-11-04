<?php

namespace App\Modules\Home\Http\Controllers;

use App\Modules\Announcement\Repositories\AnnouncementInterface;
use App\Modules\CourseContent\Repositories\CourseContentInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Message\Repositories\MessageInterface;
use App\Modules\Mockup\Repositories\MockupInterface;
use App\Modules\Quiz\Repositories\QuizInterface;
use App\Modules\Resource\Repositories\ResourcesInterface;
use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\Student\Repositories\StudentMockupInterface;
use App\Modules\Readiness\Repositories\ReadinessInterface;
use App\Modules\Student\Repositories\StudentReadinessInterface;
use App\Modules\Student\Repositories\StudentPracticeInterface;
use App\Modules\Syllabus\Repositories\SyllabusInterface;
use App\Modules\Employment\Repositories\EmploymentInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $student;
    protected $announcement;
    protected $message;
    protected $courseinfo;
    protected $coursecontent;
    protected $syllabus;
    protected $quiz;
    protected $mockup;
    protected $readiness;
    /**
     * @var ResourcesInterface
     */
    protected $resource;
    /**
     * @var StudentReadinessInterface
     */
    protected $studentReadiness;
    /**
     * @var StudentMockupInterface
     */
    protected $studentMockup;
    /**
     * @var StudentPracticeInterface
     */
    protected $studentPractice;
    /**
     * @var EmploymentInterface
     */
    protected $employment;

    public function __construct(
        StudentInterface $student,
        AnnouncementInterface $announcement,
        MessageInterface $message,
        CourseInfoInterface $courseinfo,
        CourseContentInterface $coursecontent,
        SyllabusInterface $syllabus,
        QuizInterface $quiz,
        MockupInterface $mockup,
        ReadinessInterface $readiness,
        ResourcesInterface $resource,
        StudentReadinessInterface $studentReadiness,
        StudentMockupInterface $studentMockup,
        StudentPracticeInterface $studentPractice,
        EmploymentInterface $employment) {
        $this->student = $student;
        $this->announcement = $announcement;
        $this->message = $message;
        $this->courseinfo = $courseinfo;
        $this->coursecontent = $coursecontent;
        $this->syllabus = $syllabus;
        $this->quiz = $quiz;
        $this->mockup = $mockup;
        $this->readiness = $readiness;
        $this->resource = $resource;
        $this->studentReadiness = $studentReadiness;
        $this->studentMockup = $studentMockup;
        $this->studentPractice = $studentPractice;
        $this->employment = $employment;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $data = $request->all();

        $id = Auth::guard('student')->user()->id;
        $data['student_profile'] = Auth::guard('student')->user()->find($id);
        $data['announcement'] = $this->announcement->findAll($limit = 5);
        $data['message'] = $this->message->getSendMessageByUser($id, $limit = 5);
        $data['inbox_message'] = $this->message->getInboxMessage($id, $limit = 5);
        $data['student_course'] = $this->student->getStudentCourse($id);
        $data['student_course_purchase'] = $this->student->getStudentPurchase($id);
        $data['countries'] = $this->employment->getCountries(); 
 
        if(isset($data['payment']) && $data['payment'] == 'success') {
            Flash('You have successfully enrolled the course. We will contact you soon.')->success();
        }
        return view('home::student.dashboard', $data);
    }

    public function studentProfileUpdate(Request $request, $id)
    {
        $data = $request->all();

        try {

            if ($request->hasFile('profile_pic')) {
                $data['profile_pic'] = $this->student->upload($data['profile_pic']);
            }

            $this->student->update($id, $data);
            Flash('Student Profile Updated Successfully')->success();
            return redirect(route('student-dashboard'));
        } catch (\Throwable $e) {
            Flash($e->getMessage())->error();
        }

        return redirect(route('student-dashboard'));

    }

    public function sendMessage(Request $request)
    {
        $data = $request->all();
        $message = $data['message'];

        if ($message == null) {
            Flash('Message not Enter.')->error();
            return redirect(route('student-dashboard'));
        }

        $data['sent_by'] = Auth::guard('student')->user()->id;
        $name = Auth::guard('student')->user()->full_name;
        $data['title'] = 'A Message from ' . $name;

        try {

            $this->message->save($data);
            Flash('Message Sent To Admin Successfully')->success();
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect(route('student-dashboard'));

    }

    public function studentCourse()
    {
        $id = Auth::guard('student')->user()->id;
        $data['student_course'] = $this->student->getStudentCourse($id);
        $data['other_course'] = $this->courseinfo->getAll();
        $data['resources'] = $this->resource->findAll();
        $data['student_id'] = Auth::guard('student')->user()->find($id)->id;
        $data['student_histories'] = $this->student->getAllHistories($id, 20);  

        return view('home::student.courses', $data);
    }

    public function syllabusDetail(Request $request)
    {
        $input = $request->all();
        $id = Auth::guard('student')->user()->id;
        $course_info_id = $input['course_info_id'];

        $condition = ['student_id' => $id, 'courseinfo_id' => $course_info_id];
        $data['courseInfo'] = $this->student->getStudentCourseInfo($condition);

        $data['syllabus_info'] = $this->coursecontent->getAllCourses($course_info_id);
        $data['course_info_id'] = $course_info_id;

        return view('home::student.course-syllabus', $data);

    }

    public function lessonsDetail(Request $request)
    {

        $input = $request->all();

        $course_info_id = $input['course_info_id'];
        $syllabus_id = $input['syllabus_id'];

        $data['lesson_info'] = $this->coursecontent->getAllLesson($course_info_id, $syllabus_id);

        $data['course_info_id'] = $course_info_id;
        $data['syllabus_id'] = $syllabus_id;

        $data['syllabus'] = $this->syllabus->find($syllabus_id);

        return view('home::student.course-lesson', $data);

    }

    public function lessonPlanDetail(Request $request)
    {
        $input = $request->all();

        $course_content_id = $input['course_content_id'];
        $course_info_id = $input['course_info_id'];
        $syllabus_id = $input['syllabus_id'];

        $data['lesson_detail'] = $lesson_detail = $this->coursecontent->find($course_content_id);

        $next_lesson_sort = ($lesson_detail->sort_order) + 1;

        $next_lesson = $this->coursecontent->findNextLesson($course_info_id, $syllabus_id, $next_lesson_sort);

        if ($next_lesson) {
            $data['next_course_content_id'] = $next_lesson['id'];
        } else {
            $data['next_course_content_id'] = '';
        }

        $data['course_info_id'] = $course_info_id;
        $data['syllabus_id'] = $syllabus_id;

        return view('home::student.course-lesson-detail', $data);
    }

    public function studentQuiz(Request $request)
    {
        $input = $request->all();

        $student_id = Auth::guard('student')->user()->id;
        $courseContentId = $input['course_content_id'];
        $syllabus_id = $input['syllabus_id'];
        $course_info_id = $input['course_info_id'];

        $lessonInfo = $this->coursecontent->find($courseContentId);

        $checkQuiz = $this->student->getQuizForCourseInfo($student_id, $courseContentId);
        if (!empty($checkQuiz) && $checkQuiz->percent >= 80) {
            Flash('Practise Test Already Taken.Please Proceed Next Course.')->success();
            return redirect(route('syllabus-detail', ['course_info_id' => $lessonInfo->course_info_id]));
        }

        $sort_order = $lessonInfo->sort_order;
        $previous_order = ($lessonInfo->sort_order > 1) ? $sort_order - 1 : $sort_order;
        $previousCourseontentInfo = $this->coursecontent->getPreviousData($course_info_id, $syllabus_id, $previous_order);

        $previous_course_content_id = $previousCourseontentInfo->id;

        if ($previousCourseontentInfo->is_related_to_quiz == '1') {
            $previous_quiz_result = $this->student->previousQuizData($student_id, $previous_course_content_id);

            if ($previous_course_content_id != $courseContentId) {

                if (!is_null($previous_quiz_result)) {
                    $pervious_quiz_percent = $previous_quiz_result->percent;
                    $previous_quiz_id = $previous_quiz_result->id;
                    if ($pervious_quiz_percent < 80) {

                        $this->student->deletePreviousQuizResult($previous_quiz_id);
                        $this->student->deletePreviousQuizHistory($student_id, $course_info_id, $previous_course_content_id);

                        Flash('You have to score atleast 80% from previous Quiz.Pleast Retake Practice Test Again')->success();
                        return redirect(route('syllabus-detail', ['course_info_id' => $lessonInfo->course_info_id]));

                    }

                } else {
                    Flash('You haven\'t taken previous Lesson Practice Test.')->success();
                    return redirect(route('syllabus-detail', ['course_info_id' => $lessonInfo->course_info_id]));
                }
            }

        }

        $data['general_quiz'] = $this->quiz->getGeneralById($courseContentId, 10);
        $data['courseinfoId'] = $lessonInfo->course_info_id;
        $data['course_content_id'] = $courseContentId;

        return view('home::student.general-quiz', $data);
    }

    public function studentQuizStore(Request $request)
    {
        $input = $request->all();
 
        $total_quiz_question = count($input['quiz_id']);

        $student_id = Auth::guard('student')->user()->id;
        $courseinfo_id = $input['courseinfo_id'];
        $course_content_id = $input['course_content_id'];

       /*  $checkQuiz = $this->student->checkQuizForCourseInfo($student_id, $course_content_id);
        if ($checkQuiz > 0) {
            Flash('Practise Test Already Taken.Please Proceed Next Course.')->success();
            return redirect(route('syllabus-detail', ['course_info_id' => $courseinfo_id]));
        } */

        $this->student->clearOldQuizHistory($student_id, $course_content_id);

        $checkQuiz = $this->student->getQuizForCourseInfo($student_id, $course_content_id);
        if (!empty($checkQuiz) && $checkQuiz->percent >= 80) {
            Flash('Practise Test Already Taken.Please Proceed Next Course.')->success();
            return redirect(route('syllabus-detail', ['course_info_id' => $courseinfo_id]));
        }

        if (!array_key_exists('question_option_1', $input)) {
            Flash('Are you Serious with your Test ? Please Choose your Answer.')->error();
            return redirect(route('student-courses'));
        }

        try {
            $m = 1;
            $quiz_id = $input['quiz_id'];
            $countname = sizeof($quiz_id);
            for ($i = 0; $i < $countname; $i++) {

                if ($input['quiz_id'][$i]) {

                    $quiz_id = $input['quiz_id'][$i];
                    $question_option = json_encode($input['question_option_' . $m]);

                    $quizdata['student_id'] = $student_id;
                    $quizdata['courseinfo_id'] = $courseinfo_id;
                    $quizdata['course_content_id'] = $course_content_id;
                    $quizdata['quiz_id'] = $input['quiz_id'][$i];
                    $quizdata['answer'] = json_encode($input['question_option_' . $m]);

                    $checkAnswer = $this->quiz->checkCorrectAnswer($quiz_id, $question_option);

                    if ($checkAnswer > 0) {
                        $quizdata['is_correct_answer'] = 1;
                    } else {
                        $quizdata['is_correct_answer'] = 0;
                    }

                    $this->student->saveQuizHistory($quizdata);
                    $m++;
                }
            }

            $quiz_history = $this->student->getquizHistory($student_id, $course_content_id);
            $correct_answer = $this->student->getcorrectAnswer($student_id, $course_content_id);

            $total_question = $total_quiz_question; //count($quiz_history);
            $correctPercent = ($correct_answer / $total_question) * 100;

            $data['correct_percent'] = $correct_percent = number_format($correctPercent, 2);
            $data['quiz_history'] = $quiz_history;
            $data['correct_answer'] = $correct_answer;
            $data['incorrect_answer'] = $total_question - $correct_answer;

            $quiz_result = array(
                'student_id' => $student_id,
                'courseinfo_id' => $courseinfo_id,
                'course_content_id' => $course_content_id,
                'date' => date('Y-m-d'),
                'total_question' => $total_question,
                'score' => $correct_answer,
                'percent' => $correct_percent,
            );

            $this->student->saveQuizResult($quiz_result);

            return view('home::student.general-quiz-report', $data);

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
    }

    public function mockupQuestion(Request $request)
    {

        $input = $request->all();

        $mockup_title = $input['mockup_title'];

        $mockupInfo = $this->mockup->getQuestionByTitle($mockup_title);

        if (sizeof($mockupInfo) > 0) {

            $data['mockupInfo'] = $mockupInfo;
            $data['mockup_title'] = $mockup_title;
            return view('home::student.mockup-test', $data);

        } else {
            Flash('No Mockup Question Set. Please Check Later.')->error();
            return redirect(route('student-courses'));
        }

    }

    public function studentmockupStore(Request $request)
    {
        $input = $request->all(); 

        $mockup_title = $input['mockup_title'];
        $student_id = Auth::guard('student')->user()->id;

        try {

            $mockup_history = $this->student->getmockupHistory($student_id, $mockup_title);
            $correct_answer = $this->student->getmockupcorrectAnswer($student_id, $mockup_title);

            //$total_question = count($mockup_history);
            $total_question = $this->mockup->getTotalQuestionsByTitle($mockup_title, date('Y-m-d H:i:s'));
            $correctPercent = ($correct_answer / $total_question) * 100;

            $data['correct_percent'] = $correct_percent = number_format($correctPercent, 2);
            $data['mockup_history'] = $mockup_history;
            $data['correct_answer'] = $correct_answer;
            $data['incorrect_answer'] = $total_question - $correct_answer;

            $date = date('Y-m-d');
            $resultInfo = $this->studentMockup->checkMockupResult($student_id, $mockup_title, $date);
            if (empty($resultInfo)) {

                $mockup_result = array(
                    'student_id' => $student_id,
                    'mockup_title' => $mockup_title,
                    'date' => $date,
                    'total_question' => $total_question,
                    'correct_answer' => $correct_answer,
                    'percent' => $correct_percent,
                );

                $this->student->saveMockupResult($mockup_result);
            } else {
                $updateArray = array(
                    'total_question' => $total_question,
                    'correct_answer' => $correct_answer,
                    'percent' => $correct_percent,
                );
                $resultInfo->update($updateArray);
            }

            return view('home::student.mockup-report', $data);

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
            return redirect()->back();
        }

    }

    public function studentCourseInvoice(Request $request)
    {

        $input = $request->all();

        $student_purchase_id = $input['student_purchase_id'];
        $data['status'] = $input['status'];

        $data['student_puchase_info'] = $this->student->findPurchaseCourse($student_purchase_id);

        return view('home::student.course-invoice', $data);

    }

    public function studentResources(Request $request)
    {
        $search = $request->all();
        $id = Auth::guard('student')->user()->id;
        $data['resources'] = $this->resource->findAll(50, $search);

        return view('home::student.resources', $data);
    } 

    public function readlineQuestion(Request $request)
    {
        $input = $request->all();  

        $readiness_title = $input['readline_title']; 
        $student_id = Auth::guard('student')->user()->id;

        $readliness_history = $this->studentReadiness->getCurrentReadlinessResult($student_id,$readiness_title);

        if($readliness_history){

            //Test Is Not Completed
            $resultId = $readliness_history['id'];

            $readlinessAttemptHistory = $this->studentReadiness->getAttemptedQuestion($resultId);

            $qnos = sizeof($readlinessAttemptHistory);

            $question = array();
            foreach ($readlinessAttemptHistory as $key => $value) {
               $questionArray = $value['question_id'];
               array_push($question, $questionArray);
            }

            $is_new = TRUE;
            $result_id = $resultId;
            $readinessInfo = $this->readiness->getQuestionByTitle($readiness_title, 250,$question);            

        }else{
            $qnos = 1;
            $is_new = FALSE;
            $result_id = '';
            $readinessInfo = $this->readiness->getQuestionByTitle($readiness_title, 250);
        }


        if (sizeof($readinessInfo) > 0) {
            $data['qnos'] = $qnos;
            $data['is_new'] = $is_new;
            $data['result_id'] = $result_id;
            $data['readinessInfo'] = $readinessInfo;
            $data['readiness_title'] = $readiness_title; 
            return view('home::student.readline-test', $data);

        } else {
            Flash('No Readline Question Set. Please Check Later.')->error();
            return redirect(route('student-courses'));
        }

    }

    public function saveStartTime(Request $request)
    {
        $input = $request->all();
        $start_time = date('Y-m-d H:i:s');
        try {
            $id = Auth::guard('student')->user()->id;

            $insertArray = [
                'student_id' => $id,
                'date' => date('Y-m-d'),
                'title' => $input['title'],
                'start_time' => $start_time,
            ];

            $readiness = $this->studentReadiness->save($insertArray);

            return ['status' => '1', 'start_time' => $start_time, 'result_id' => $readiness->id];
        } catch (\Throwable $t) {
            return ['status' => '0'];
        }
    }

    public function saveBreakTime(Request $request)
    {
        $input = $request->all();
        $break_time = date('Y-m-d H:i:s');
        try {
            $id = Auth::guard('student')->user()->id;

            $updateArray = [
                'break_time' => $break_time,
            ];

            $readiness = $this->studentReadiness->update($input['result_id'], $updateArray);

            return 1;
        } catch (\Throwable $t) {
            return 0;
        }
    }

    public function studentReadinessStore(Request $request)
    {

        $input = $request->all(); 
        $title = $input['title'];

        try {
            $student_id = Auth::guard('student')->user()->id;

            $readiness_history = $this->studentReadiness->getHistory($student_id, $title);
            $correct_answer = $this->studentReadiness->getCorrectAnswerByResult($input['readiness_result_id']);

            $total_question = count($input['question_id']);
            $correctPercent = ($correct_answer / $total_question) * 100;
           
            $data['correct_percent'] = $correct_percent = number_format($correctPercent, 2);
            $data['readiness_history'] = $readiness_history;
            $data['correct_answer'] = $correct_answer;
            $data['incorrect_answer'] = $total_question - $correct_answer;

            $date = date('Y-m-d');
            $resultInfo = $this->studentReadiness->checkReadinessResult($student_id, $title, $date); 
            if (empty($resultInfo)) {

                $readiness_result = array(
                    'student_id' => $student_id,
                    'title' => $title,
                    'date' => $date,
                    'total_question' => $total_question,
                    'total_attempted_question' => $total_question,
                    'correct_answer' => $correct_answer,
                    'percent' => $correct_percent,
                );

                $this->studentReadiness->save($readiness_result);
            } else {
                $updateArray = array(
                    'total_question' => $total_question,
                    'total_attempted_question' => $total_question,
                    'correct_answer' => $correct_answer,
                    'percent' => $correct_percent,
                );
                $resultInfo->update($updateArray);
            }

            return view('home::student.readiness-report', $data);

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
            return redirect()->back();
        }

    }

    public function ajaxQuestionStore(Request $request)
    {
        $input = $request->all();
        $mockup_title = $input['mockup_title'];
        $qkey = $input['qkey'];
        $question_id = $input['question_id'];

        $answers = [];
        if (isset($input['answers']) && !empty($input['answers'])) {
            $answers = $input['answers'];
        } else {
            return 0;
        }

        try {

            $student_id = Auth::guard('student')->user()->id;
            $date = date('Y-m-d');

            $resultInfo = $this->studentMockup->checkMockupResult($student_id, $mockup_title, $date);
            if (empty($resultInfo)) {
                $mockup_result = array(
                    'student_id' => $student_id,
                    'mockup_title' => $mockup_title,
                    'date' => date('Y-m-d'),
                );

                $resultInfo = $this->student->saveMockupResult($mockup_result);
                $result_id = $resultInfo->id;
            } else {
                $result_id = $resultInfo->id;
            }

            /*   if ($qkey == 1) {
            $this->student->deleteMockuphistory($student_id, $mockup_title);
            }
             */
            $mockup_question = $this->mockup->find($question_id);
            if ($mockup_question->question_type == 'multiple') {
                $question_option = json_encode($answers);
            } else {
                $question_option = $answers;
            }

            $mockupdata['mockup_result_id'] = $result_id;
            $mockupdata['student_id'] = $student_id;
            $mockupdata['mockup_title'] = $mockup_title;
            $mockupdata['question_id'] = $question_id;
            $mockupdata['answer'] = $question_option;

            $checkAnswer = $this->mockup->checkCorrectAnswer($question_id, $question_option);

            if ($checkAnswer > 0) {
                $mockupdata['is_correct_answer'] = 1;
            } else {
                $mockupdata['is_correct_answer'] = 0;
            }

            $whereArray = [
                'mockup_result_id' => $result_id,
                'student_id' => $student_id,
                'mockup_title' => $mockup_title,
                'question_id' => $question_id
            ];

            $checkQuestionHistory = $this->studentMockup->getQuestionHistory($whereArray);
            if(!empty($checkQuestionHistory)) {
                $this->studentMockup->updateQuestionHistory($checkQuestionHistory->id, $mockupdata);
            } else {
                $this->studentMockup->saveHistory($mockupdata);
            }

            return 1;

        } catch (\Throwable $e) {
            return 2;
        }

    }

    public function ajaxReadinessStore(Request $request)
    {

        $input = $request->all();  
        $title = $input['title'];
        $qkey = $input['qkey'];
        $read_result_id = (array_key_exists('read_result_id',$input)) ? $input['read_result_id'] : null;   
        $question_id = $input['question_id'];
        // unset($input['readiness_result_id']);
        $answers = [];
        if (isset($input['answers']) && !empty($input['answers'])) {
            $answers = $input['answers'];
        } else {
            return 0;
        }

        try {

            $student_id = Auth::guard('student')->user()->id;
            $date = date('Y-m-d');

            if($read_result_id == null){    
                if($qkey == 1) {
                    $readiness_result = array(
                        'student_id' => $student_id,
                        'title' => $title,
                        'date' => date('Y-m-d'),
                    );

                    $resultInfo = $this->studentReadiness->save($readiness_result);
                    $result_id = $resultInfo->id;
                } else {
                    $resultInfo = $this->studentReadiness->checkReadinessResult($student_id, $title, $date);
                    if (empty($resultInfo)) {
                        $readiness_result = array(
                            'student_id' => $student_id,
                            'title' => $title,
                            'date' => date('Y-m-d'),
                        );
     
                        $resultInfo = $this->studentReadiness->save($readiness_result);
                        $result_id = $resultInfo->id;
                    } else {
                        $result_id = $resultInfo->id;
                    }
                }
            }else{
                $result_id = $read_result_id;
            }
          
            $readiness_question = $this->readiness->find($question_id);  
            if ($readiness_question->question_type == 'multiple') {
                $question_option = json_encode($answers);
            } else {
                $question_option = $answers;
            }

            $readinessdata['readiness_result_id'] = $result_id;
            $readinessdata['student_id'] = $student_id;
            $readinessdata['title'] = $title;
            $readinessdata['question_id'] = $question_id;
            $readinessdata['answer'] = $question_option;

            $checkAnswer = $this->readiness->checkCorrectAnswer($question_id, $question_option);

            if ($checkAnswer > 0) {
                $readinessdata['is_correct_answer'] = 1;
            } else {
                $readinessdata['is_correct_answer'] = 0;
            }

            $whereArray = [
                'readiness_result_id' => $result_id,
                'student_id' => $student_id,
                'title' => $title,
                'question_id' => $question_id
            ];

           

            $checkQuestionHistory = $this->studentReadiness->getWhereQuestionHistory($whereArray);    
            if(!empty($checkQuestionHistory)) {
                $this->studentReadiness->updateHistory($checkQuestionHistory->id, $readinessdata);
            } else {
                $this->studentReadiness->saveHistory($readinessdata);
            }
            
            return $result_id;

        } catch (\Throwable $e) {
            return 2;
        }

    }

    public function studentMockupHistory($id)
    {
        $student_id = Auth::guard('student')->user()->id;
        try {
            $data['mockup_histories'] = $this->studentMockup->findAllHistory('', ['mockup_result_id' => $id]);

            //$total_question = $this->mockup->getTotalQuestionsByTitle($mockup_title, date('Y-m-d H:i:s'));
            return view('home::student.mockup-history', $data);

        } catch (\Throwable $e) {
            Flash($e->getMessage())->error();
            return redirect()->route('student-courses');
        }

    }

    public function practiceQuestion(Request $request)
    {
        $input = $request->all();

        $practice_title = $input['practice_title'];
        $total_questions = ($practice_title == 'practice_test_1' ? '25' : ($practice_title == 'practice_test_2' ? '50' : '100'));
        $mockupInfo = $this->mockup->getRandomQuestion($total_questions, ['practice_title' => $practice_title]);
        if (sizeof($mockupInfo) > 0) {
            $data['mockupInfo'] = $mockupInfo;
            $data['practice_title'] = $practice_title;
            return view('home::student.practice-test', $data);

        } else {
            Flash('No Practice Question Set. Please Check Later.')->error();
            return redirect(route('student-courses'));
        }

    }

    public function studentPracticeStore(Request $request)
    {
        $input = $request->all();
        $title = $input['title'];

        try {
            $student_id = Auth::guard('student')->user()->id;

            $mockup_history = $this->studentPractice->getHistory($student_id, $title);
            //$correct_answer = $this->studentPractice->getCorrectAnswer($student_id, $title);
            $correct_answer = $this->studentPractice->getCorrectAnswerByResult($input['practice_result_id']);

            //$total_attempt_question = count($mockup_history);
            $total_question = ($title == 'practice_test_1' ? '25' : ($title == 'practice_test_2' ? '50' : '100'));
            $correctPercent = ($correct_answer / $total_question) * 100;
           
            $data['correct_percent'] = $correct_percent = number_format($correctPercent, 2);
            $data['mockup_history'] = $mockup_history;
            $data['correct_answer'] = $correct_answer;
            $data['incorrect_answer'] = $total_question - $correct_answer;

            $date = date('Y-m-d');
            $resultInfo = $this->studentPractice->checkPracticeResult($student_id, $title, $date); 
            if (empty($resultInfo)) {

                $practice_result = array(
                    'student_id' => $student_id,
                    'mockup_title' => $title,
                    'date' => $date,
                    'total_question' => $total_question,
                    'total_attempted_question' => $total_question,
                    'correct_answer' => $correct_answer,
                    'percent' => $correct_percent,
                );

                $this->student->save($practice_result);
            } else {
                $updateArray = array(
                    'total_question' => $total_question,
                    'total_attempted_question' => $total_question,
                    'correct_answer' => $correct_answer,
                    'percent' => $correct_percent,
                );
                $resultInfo->update($updateArray);
            }

            return view('home::student.practice-report', $data);

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
            return redirect()->back();
        }

    }

    public function ajaxPracticeStore(Request $request)
    {

        $input = $request->all();
        $title = $input['title'];
        $qkey = $input['qkey'];
        $question_id = $input['question_id'];

        $answers = [];
        if (isset($input['answers']) && !empty($input['answers'])) {
            $answers = $input['answers'];
        } else {
            return 0;
        }

        try {

            $student_id = Auth::guard('student')->user()->id;
            $date = date('Y-m-d');

            if($qkey == 1) {
                $practice_result = array(
                    'student_id' => $student_id,
                    'title' => $title,
                    'date' => date('Y-m-d'),
                );

                $resultInfo = $this->studentPractice->save($practice_result);
                $result_id = $resultInfo->id;
            } else {
                $resultInfo = $this->studentPractice->checkPracticeResult($student_id, $title, $date);
                if (empty($resultInfo)) {
                    $practice_result = array(
                        'student_id' => $student_id,
                        'title' => $title,
                        'date' => date('Y-m-d'),
                    );
 
                    $resultInfo = $this->studentPractice->save($practice_result);
                    $result_id = $resultInfo->id;
                } else {
                    $result_id = $resultInfo->id;
                }
            }
          
            $mockup_question = $this->mockup->find($question_id);
            if ($mockup_question->question_type == 'multiple') {
                $question_option = json_encode($answers);
            } else {
                $question_option = $answers;
            }

            $mockupdata['practice_result_id'] = $result_id;
            $mockupdata['student_id'] = $student_id;
            $mockupdata['title'] = $title;
            $mockupdata['question_id'] = $question_id;
            $mockupdata['answer'] = $question_option;

            $checkAnswer = $this->mockup->checkCorrectAnswer($question_id, $question_option);

            if ($checkAnswer > 0) {
                $mockupdata['is_correct_answer'] = 1;
            } else {
                $mockupdata['is_correct_answer'] = 0;
            }

            $whereArray = [
                'practice_result_id' => $result_id,
                'student_id' => $student_id,
                'title' => $title,
                'question_id' => $question_id
            ];

            $checkQuestionHistory = $this->studentPractice->getQuestionHistory($whereArray);
            if(!empty($checkQuestionHistory)) {
                $this->studentPractice->updateHistory($checkQuestionHistory->id, $mockupdata);
            } else {
                $this->studentPractice->saveHistory($mockupdata);
            }
            

            return $result_id;

        } catch (\Throwable $e) {
            return 2;
        }

    }

    public function studentPracticeHistory($id)
    {
        $student_id = Auth::guard('student')->user()->id;
        try {
            $data['practice_histories'] = $this->studentPractice->findAllHistory('', ['practice_result_id' => $id]);
            return view('home::student.practice-history', $data);

        } catch (\Throwable $e) {
            Flash($e->getMessage())->error();
            return redirect()->route('student-courses');
        }

    }

    public function ajaxAnnouncementDetail(Request $request){
        $data = $request->all();

        $announcement_id = $data['announcement_id'];

        $announcement_info = $this->announcement->find($announcement_id);


        $html ='';
        $html .= "<table class='table table-striped table-border-dashed' id='table1' cellspacing='0' width='100%' frame='box' border='0'>";
        $html .= "<tbody>";
        $html .= "<tr>";
        $html .= "<td class='font-weight-black'>Title : </td>";
        $html .= "<td><b>".$announcement_info->title."</b></td>";
        $html .= "</tr>";

        $html .= "<tr>";
        $html .= "<td class='font-weight-black'>Content: </td>";
        $html .= "<td>".$announcement_info->content."</td>";
        $html .= "</tr>";



        $html .= "</tbody>";
        $html .= "</table>";

        return  $html;


    }

}
