<?php

namespace App\Modules\ReminderNotify\Repositories;

interface ReminderNotifyInterface
{
    public function save($data);
    public function getLatestReminderNotify();
    public function getJoinDateNotify();
    public function getListUpcomingBirthday();
    public function update($id, $data);
    public function getReminderByTypeAndUser($type, $user = null);
}