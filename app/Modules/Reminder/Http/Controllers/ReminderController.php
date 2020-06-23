<?php

namespace App\Modules\Reminder\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

// Repository
use App\Modules\Reminder\Repositories\ReminderInterface;
use App\Modules\Dropdown\Repositories\DropdownInterface;

class ReminderController extends Controller
{
    protected $reminder;

    public function __construct(ReminderInterface $reminder, DropdownInterface $dropdown)
    {
        $this->reminder = $reminder;
        $this->dropdown = $dropdown;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $reminders = $this->reminder->findAll(10);
        
        return view('reminder::reminder.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['priorities'] = $this->reminder->getPriorityList();
        $data['reminderTypes'] = $this->dropdown->getFieldBySlug('reminder_type');
        $data['repeatTypes'] = $this->reminder->getRepeatType();
        return view('reminder::reminder.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {  
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;
        $data['next_repeat_date'] = $data['remind_date'];
        if (!$data['is_remind_range']) {
            $data['remind_to'] = $data['remind_date'];
            $data['remind_from'] = Carbon::parse($data['remind_date'])->subDays($data['remind_before']);
        } else {
            $data['remind_before'] = null;
        }

        try {
            $this->reminder->save($data);
            alertify('Reminder Added Successfully.')->success();
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect()->route('reminder.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('reminder::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['reminder'] = $this->reminder->find($id);
        $data['priorities'] = $this->reminder->getPriorityList();
        $data['repeatTypes'] = $this->reminder->getRepeatType();
        $data['reminderTypes'] = $this->dropdown->getFieldBySlug('reminder_type');
        return view('reminder::reminder.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $data['next_repeat_date'] = $data['remind_date'];
        if (!$data['is_remind_range']) {
            $data['remind_to'] = $data['remind_date'];
            $data['remind_from'] = Carbon::parse($data['remind_date'])->subDays($data['remind_before']);
        } else {
            $data['remind_before'] = null;
        }

        try {
            $this->reminder->update($id, $data);
            alertify('Reminder Updated Successfully.')->success();
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect()->route('reminder.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->reminder->delete($id);
            alertify('Reminder Deleted Successfully.')->success();
        } catch (\Throwable $e) {
            alertigy($e->getMessage())->error();
        }

        return redirect()->back();
    }
}
