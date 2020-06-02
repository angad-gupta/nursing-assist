<?php

namespace App\Modules\Reminder\Repositories;

use Carbon\Carbon;
use App\Modules\Reminder\Entities\Reminder;
/**
 * ReminderRepository
 */
class ReminderRepository implements ReminderInterface
{
    public function save($data)
    {
        return Reminder::create($data);
    }

    public function findAll($limit = 10)
    {
        return Reminder::latest()->paginate($limit);
    }

    public function getPriorityList()
    {
        return Reminder::PRIORITY;
    }

    public function find($id)
    {
        return Reminder::find($id);
    }

    public function update($id, $data)
    {
        return Reminder::find($id)->update($data);
    }

    public function delete($id)
    {
        return Reminder::find($id)->delete();
    }

    public function getReminder()
    {
        $reminders = Reminder::whereCreatedBy(auth()->user()->id)
            ->where('remind_to', '<', Carbon::now())
            ->get();
        foreach ($reminders as $key => $reminder) {
            $daysToAdd = 0;
            $oldReminder = $reminder;
            switch ($reminder->repeat_type) {
                case 0:
                $data['remind_from'] = Carbon::parse($oldReminder->remind_from)->addDays(1);
                $data['remind_to'] = Carbon::parse($oldReminder->remind_to)->addDays(1);
                break;
                case 1;
                $data['remind_from'] = Carbon::parse($oldReminder->remind_from)->addDays(7);
                $data['remind_to'] = Carbon::parse($oldReminder->remind_to)->addDays(7);
                break;
                case 2;
                $data['remind_from'] = Carbon::parse($oldReminder->remind_from)->addMonth();
                $data['remind_to'] = Carbon::parse($oldReminder->remind_to)->addMonth();
                break;
                case 3;
                $data['remind_from'] = Carbon::parse($oldReminder->remind_from)->addYear();
                $data['remind_to'] = Carbon::parse($oldReminder->remind_to)->addYear();
                break;
            }
            $reminder->update($data);
        }

        return Reminder::whereCreatedBy(auth()->user()->id)
        ->where(function ($query) {
            $query->where('remind_from', '<=', Carbon::now());
            $query->where('remind_to', '>=', Carbon::now()->subDays(1));
        })->latest()
        ->take(10)
        ->get();
    }

    public function getRepeatType()
    {
        return Reminder::REPEATTYPE;
    }
}
