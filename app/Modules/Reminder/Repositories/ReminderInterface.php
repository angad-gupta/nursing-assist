<?php 

namespace App\Modules\Reminder\Repositories;

interface ReminderInterface
{
	public function save($data);
	public function findAll($limit);
	public function getPriorityList();
	public function find($id);
	public function update($id, $data);
	public function delete($id);
	public function getReminder();
	public function getRepeatType();
}
