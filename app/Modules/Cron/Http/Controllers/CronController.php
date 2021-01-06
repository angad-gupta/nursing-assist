<?php

namespace App\Modules\Cron\Http\Controllers;

use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Student\Entities\StudentMockupResult;
use App\Modules\Student\Repositories\StudentInterface;
//use App\Modules\Student\Entities\StudentMockupHistory;
use App\Modules\Student\Repositories\StudentMockupInterface;
use App\Modules\Student\Repositories\StudentPaymentInterface;
use App\Notifications\EnrolmentInstallmentPayment;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CronController extends Controller
{
    /**
     * @var StudentPaymentInterface
     */
    protected $studentPayment;
    /**
     * @var CourseInfoInterface
     */
    protected $courseinfo;
    /**
     * @var StudentInterface
     */
    protected $student;
    /**
     * @var StudentMockupInterface
     */
    protected $studentMockup;

    public function __construct(StudentPaymentInterface $studentPayment, CourseInfoInterface $courseinfo, StudentInterface $student, StudentMockupInterface $studentMockup)
    {
        $this->studentPayment = $studentPayment;
        $this->courseinfo = $courseinfo;
        $this->student = $student;
        $this->studentMockup = $studentMockup;
    }

    /**
     * Send second and third installment mail reminder
     * @return Response
     */
    public function installmentNotification()
    {

        $payments = $this->studentPayment->getInstallmentPayment();
        if ($payments->count() > 0) {
            foreach ($payments as $value) {
                $data['payment_info'] = $value;
                $course_program_title = optional($value->courseInfo)->course_program_title;
                $data['student_info'] = $studentInfo = optional($value->studentInfo);
                $data['full_name'] = $studentInfo->full_name;
                $course_info_id = $value->courseinfo_id;
                // $student_id = $value->student_id;
                $student_id = 187;
                $student_payment_id = $value->id;

                //difference in days
                if (!empty($value->course_start_date)) {
                    $difference = 0;
                    if ($value->course_start_date <= date('Y-m-d')) {
                        $moved_date = new Carbon($value->course_start_date);
                        $now = Carbon::now();
                        $difference = $moved_date->diff($now)->days;

                    }

                    //second installment pre notification mail after 13  days of student move to course
                    if ($difference == 21 || $difference == 26) {

                        if (date('Y-m-d') >= '2020-01-31') {
                            $second_installment_amt = 'A$1,500';
                        } else {
                            $second_installment_amt = 'A$2,500';
                        }

                        $data['subject'] = 'Second Installment Pre-Notification for ' . $course_program_title . ' Course Enrolment';
                        $data['mail_desc'] = 'Please pay second installment amount of ' . $second_installment_amt . ' for ' . $course_program_title . ' course enrolment continuation after 2 days.';
                        $data['pay_url'] = route('enrolment.installment.pay', ['id' => $student_payment_id, 'ins' => 2]);

                        $studentInfo->notify(new EnrolmentInstallmentPayment($data));
                    }

                    //second installment mail after 15  days of student move to course
                    if ($difference == 28) {

                        if (date('Y-m-d') >= '2020-01-31') {
                            $second_installment_amt = 'A$1,500';
                        } else {
                            $second_installment_amt = 'A$2,500';
                        }

                        $data['subject'] = 'Second Installment Notification for ' . $course_program_title . ' Course Enrolment';
                        $data['mail_desc'] = 'Please pay second installment amount of ' . $second_installment_amt . ' for ' . $course_program_title . ' course enrolment continuation.';
                        $data['pay_url'] = route('enrolment.installment.pay', ['id' => $student_payment_id, 'ins' => 2]);

                        $studentInfo->notify(new EnrolmentInstallmentPayment($data));

                        $this->studentPayment->update($value->id, ['moved_to_student' => 0]);

                        //update status of course for not providin installments payments
                        $courseInfo = $this->courseinfo->find($course_info_id);
                        $is_package = $courseInfo->is_course_package;

                        if ($is_package == 1) {
                            $course_id = $courseInfo->course_id;
                            $course_package = $this->courseinfo->getCoursePackage($course_id, $course_info_id);

                            foreach ($course_package as $key => $pack_val) {

                                $wherecondition = array(
                                    'student_id' => $student_id,
                                    'courseinfo_id' => $pack_val->id,
                                );

                                $this->student->updateStudentCourseStatus(['status' => 0], $wherecondition);
                            }

                        } else {

                            $wherecondition = array(
                                'student_id' => $student_id,
                                'courseinfo_id' => $courseinfo_id,
                            );

                            $this->student->updateStudentCourseStatus(['status' => 0], $wherecondition);

                        }
                    }

                    //third installment pre notification mail after 13  days of student move to course
                    /* if ($difference == 28) {

                    if(date('Y-m-d') >= '2020-01-31') {
                    $final_installment_amt = 'A$2,500';
                    } else {
                    $final_installment_amt =  'A$1,500';
                    }

                    $data['subject'] = 'Final Installment Pre-Notification for ' . $course_program_title . ' Course Enrolment';
                    $data['mail_desc'] = 'Please pay final installment amount of ' . $final_installment_amt . ' for ' . $course_program_title . ' course enrolment continuation after 2 days.';
                    $data['pay_url'] = route('enrolment.installment.pay', ['id' => $student_payment_id, 'ins' => 3]);

                    $studentInfo->notify(new EnrolmentInstallmentPayment($data));
                    }
                     */
                    //third installment mail after 30 days of student move to course
                    /*                     if ($difference == 30 ) {
                if(date('Y-m-d') >= '2020-01-31') {
                $final_installment_amt = 'A$2,500';
                } else {
                $final_installment_amt =  'A$1,500';
                }

                $data['subject'] = 'Final Installment Notification for ' . $course_program_title . ' Course Enrolment';
                $data['mail_desc'] = 'Please pay final installment amount of ' . $final_installment_amt . ' for ' . $course_program_title . ' course enrolment continuation.';
                $data['pay_url'] = route('enrolment.installment.pay', ['id' => $student_payment_id, 'ins' => 3]);

                $studentInfo->notify(new EnrolmentInstallmentPayment($data));

                $this->studentPayment->update($value->id, ['moved_to_student' => 0]);

                //update status of course for not providin installments payments
                $courseInfo = $this->courseinfo->find($course_info_id);
                $is_package = $courseInfo->is_course_package;

                if ($is_package == 1) {
                $course_id = $courseInfo->course_id;
                $course_package = $this->courseinfo->getCoursePackage($course_id, $course_info_id);

                foreach ($course_package as $key => $pack_val) {

                $wherecondition = array(
                'student_id' => $student_id,
                'courseinfo_id' => $pack_val->id,
                );

                $this->student->updateStudentCourseStatus(['status' => 0], $wherecondition);
                }

                } else {

                $wherecondition = array(
                'student_id' => $student_id,
                'courseinfo_id' => $courseinfo_id,
                );

                $this->student->updateStudentCourseStatus(['status' => 0], $wherecondition);

                }
                } */
                }
            }
        }

    }

    public function updateStudentMockupHistory()
    {
        /*  $result = DB::table('student_mockup_histories as h')
        ->join('student_mockup_results as r', function($join)
        {
        $join->on('r.student_id', '=', 'h.student_id');
        $join->on('r.mockup_title','=', 'h.mockup_title');
        })
        ->orderBy('id', 'desc')
        ->get(); dd($result->count()); */

        $result = StudentMockupResult::select(DB::raw('max(id) as result_id'), 'student_id', 'mockup_title')
            ->groupBy('student_id', 'mockup_title')
            ->get();
        if ($result->count() > 0) {
            foreach ($result as $value) {
                $this->studentMockup->updateHistory($value->student_id, $value->mockup_title, ['mockup_result_id' => $value->result_id]);
            }
        }
    }

    /**
     * Send nclex final installment mail reminder
     * @return Response
     */
    public function nclexInstallmentNotification()
    {
        $payments = $this->studentPayment->getInstallmentPayment();
        if ($payments->count() > 0) {
            foreach ($payments as $value) {

                $course_program_title = optional($value->courseInfo)->course_program_title;
                $studentInfo = optional($value->studentInfo);
                $data['full_name'] = $studentInfo->full_name;
                $course_info_id = $value->courseinfo_id;
                $student_id = $value->student_id;
                $student_payment_id = $value->id;

                //difference in days
                $moved_date = new Carbon($value->moved_date);
                $now = Carbon::now();
                $difference = $moved_date->diff($now)->days;

                //final installment mail after 30 days of student move to course
                if ($difference == 28 && optional($value->courseInfo)->course_program_title == 'NCLEX') {
                    $final_installment_amt = 'A$1,000';

                    $data['subject'] = 'Final Installment Notification for ' . $course_program_title . ' Course Enrolment';
                    $data['mail_desc'] = 'Please pay final installment amount of ' . $final_installment_amt . ' for ' . $course_program_title . ' course enrolment continuation.';
                    $data['pay_url'] = route('enrolment.installment.pay', ['id' => $student_payment_id, 'ins' => 2]);

                    $studentInfo->notify(new EnrolmentInstallmentPayment($data));

                    $this->studentPayment->update($value->id, ['moved_to_student' => 0]);

                    //update status of course for not providin installments payments
                    $courseInfo = $this->courseinfo->find($course_info_id);
                    $is_package = $courseInfo->is_course_package;

                    if ($is_package == 1) {
                        $course_id = $courseInfo->course_id;
                        $course_package = $this->courseinfo->getCoursePackage($course_id, $course_info_id);

                        foreach ($course_package as $key => $pack_val) {

                            $wherecondition = array(
                                'student_id' => $student_id,
                                'courseinfo_id' => $pack_val->id,
                            );

                            $this->student->updateStudentCourseStatus(['status' => 0], $wherecondition);
                        }

                    } else {

                        $wherecondition = array(
                            'student_id' => $student_id,
                            'courseinfo_id' => $courseinfo_id,
                        );

                        $this->student->updateStudentCourseStatus(['status' => 0], $wherecondition);

                    }
                }
            }
        }

    }

    /**
     * Send third installment mail reminder as per set installment date from cms
     * @return Response
     */
    public function finalInstallmentNotification()
    {

        $payments = $this->studentPayment->getInstallmentPayment();
        if ($payments->count() > 0) {
            foreach ($payments as $value) {

                $course_program_title = optional($value->courseInfo)->course_program_title;
                $studentInfo = optional($value->studentInfo);
                $data['full_name'] = $studentInfo->full_name;
                $course_info_id = $value->courseinfo_id;
                // $student_id = $value->student_id;
                $student_id = 187;
                $student_payment_id = $value->id;

                if (!empty($value->final_installment_date) && $value->final_installment_date == date('Y-m-d')) {
                    //third installment mail after 30 days of student move to course

                    if (date('Y-m-d') >= '2020-01-31') {
                        $final_installment_amt = 'A$2,500';
                    } else {
                        $final_installment_amt = 'A$1,500';
                    }

                    $data['subject'] = 'Final Installment Notification for ' . $course_program_title . ' Course Enrolment';
                    $data['mail_desc'] = 'Please pay final installment amount of ' . $final_installment_amt . ' for ' . $course_program_title . ' course enrolment continuation.';
                    $data['pay_url'] = route('enrolment.installment.pay', ['id' => $student_payment_id, 'ins' => 3]);

                    $studentInfo->notify(new EnrolmentInstallmentPayment($data));

                    $this->studentPayment->update($value->id, ['moved_to_student' => 0]);

                    //update status of course for not providin installments payments
                    if ($course_program_title == 'OSCE' && $course_info_id == 2) {
                        $courseInfo = $this->courseinfo->find($course_info_id);
                        $is_package = $courseInfo->is_course_package;

                        if ($is_package == 1) {

                            $wherecondition = array(
                                'student_id' => $student_id,
                                'courseinfo_id' => 2,
                            );

                            $this->student->updateStudentCourseStatus(['status' => 0], $wherecondition);

                        } else {

                            $wherecondition = array(
                                'student_id' => $student_id,
                                'courseinfo_id' => 2,
                            );

                            $this->student->updateStudentCourseStatus(['status' => 0], $wherecondition);

                        }
                    }

                }
            }
        }

    }
}
