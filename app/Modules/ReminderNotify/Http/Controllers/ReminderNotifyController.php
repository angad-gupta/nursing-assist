<?php

namespace App\Modules\ReminderNotify\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

// Repositories
use App\Modules\ReminderNotify\Repositories\ReminderNotifyInterface;

class ReminderNotifyController extends Controller
{
    protected $reminder;

    public function __construct(ReminderNotifyInterface $reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('remindernotify::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('remindernotify::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('remindernotify::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('remindernotify::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function change_status($id)
    {
        try {
            $data = [
                'status' => '0'
            ];
            $this->reminder->update($id, $data);
            alertify('Reminder Has Been Removed for Now.')->success();
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect()->back();
    }
}
