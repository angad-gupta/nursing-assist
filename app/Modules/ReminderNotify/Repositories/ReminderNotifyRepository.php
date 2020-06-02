<?php

namespace App\Modules\ReminderNotify\Repositories;

use App\Modules\ReminderNotify\Entities\ReminderNotify;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\DB;

class ReminderNotifyRepository implements ReminderNotifyInterface
{
    public function save($data)
    {
        ReminderNotify::create($data);
    }

    public function getLatestReminderNotify()
    {
        $now = Carbon::now();
        $compile_now_date = date('Y-m-d',strtotime($now));
        return ReminderNotify::where('snoooze_date', "<=", Carbon::now())
            ->where('date', '>=', Carbon::now())
            ->latest()
            ->get();
    }

    public function getJoinDateNotify(){
        $now = Carbon::now();
        $compile_now_date = date('m-d',strtotime($now));
        $date = Carbon::now()->subDays(20);
        $compile_date = date('m-d',strtotime($date));

        $userInfo = Auth::user();
        $user_type = $userInfo->user_type;
        if($user_type == 'super_admin' OR $user_type == 'admin') {
            return ReminderNotify::whereBetween(DB::raw("DATE_FORMAT(`date`,'%m-%d')"), array($compile_date,$compile_now_date))->where( 'display_type', '=', 0)->get();
        }

    }

    public function getListUpcomingBirthday()
    {
        $now = Carbon::now();

        $compile_now_date = date('m-d',strtotime($now));
        $date = Carbon::now()->addDays(30);
        $compile_date = date('m-d',strtotime($date));
        $birth_date=ReminderNotify::whereBetween(DB::raw("DATE_FORMAT(`date`,'%m-%d')"), array($compile_now_date, $compile_date))->where( 'display_type', '=', 1)->get();
        return $birth_date;
    }

    public function update($id, $data)
    {
        return ReminderNotify::find($id)
            ->update($data);
    }

    public function getReminderByTypeAndUser($type, $user = null)
    {
        if (!$user) {
            $user = auth()->user()->id;
        }
        return ReminderNotify::where('reminder_type', $type)
            ->where('employee_id', $user)
            ->where('snoooze_date', "<=", Carbon::now())
            ->where('date', '>=', Carbon::now())
            ->get();
    }
}