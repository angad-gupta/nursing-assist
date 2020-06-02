<?php

namespace App\Modules\Notification\Http\Controllers;


use App\Modules\Notification\Repositories\CustomNotificationInterface;
use Berkayk\OneSignal\OneSignalFacade;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Auth;
use Illuminate\Routing\Controller;

class CustomNotificationController extends Controller
{
    protected $notification;

    public function __construct(CustomNotificationInterface $notification)
    {
        $this->notification = $notification;
    }

    public function index(Request $request)
    {
        $filter['title'] = $request->get('q');
        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $notifications = $this->notification->findAll($limit = 4, $filter, $sort);
        $notifications->appends(['q' => $filter['title']]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        return view('notification::notification.index', compact('notifications', 'sort'));
    }

    public function create()
    {
        return view('notification::notification.create');
    }

    public function store(Request $request)
    {
        $all = $request->all();
        $coverImage = $request->file('image');

        try {

            //Cover Image
            if ($request->hasFile('image')) {
                $all['image'] = $this->notification->upload($coverImage);
            }

            $data = $this->notification->save($all);

            if (isset($data)) {
                OneSignalFacade::sendNotificationToAll(
                    "{$data['detail']}",
                    $url = null,
                    $data = $data,
                    $buttons = null,
                    $schedule = null,

                    "{$data['title']}",
                    'COVID 19'
                );
            }


            flash("Data Created Successfully")->success();

        } catch (\Throwable $e) {
            flash($e->getMessage())->error();
        }

        return redirect(route('notification.index'));
    }

    public function show($id)
    {
        $team = $this->team->find($id);
        return view('notification::notification.show', compact('notification'));
    }

    public function edit($id)
    {
        $notification = $this->notification->find($id);
        if (empty($notification)) {
            return redirect(route('notification.index'));
        }
        return view('notification::notification.edit', compact('notification'));
    }


    public function update(Request $request, $notificationID)
    {
        $all = $request->all();
        $coverImage = $request->file('logo');
//        dd($all,$coverImage);
        try {


            $tem = $this->notification->find($notificationID);

            if ($request->hasFile('logo')) {

                if (file_exists(public_path() . notification::COVER_IMAGE_PATH . $tem->logo)) {
                    unlink(public_path() . notification::COVER_IMAGE_PATH . $tem->logo);
                }

                $all['logo'] = $this->notification->upload($coverImage);

            } else {

                $all['logo'] = $request->get('old_logo');
            }

            $this->notification->update($notificationID, $all);


            flash("Data Updated Successfully")->success();

        } catch (\Throwable $e) {
            flash($e->getMessage() . "Line::" . $e->getLine() . "File::" . $e->getFile())->error();
        }

        return redirect(route('notification.index'));
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->notification->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('notification.index'));
    }

    public function delete($id)
    {

        try {
            if ($id) {
                $this->notification->delete($id);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('notification.index'));
    }

    public function status(Request $request)
    {
        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');
                $status = $this->notification->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x fa-lg text-danger"></i>';
                } elseif ($status == 1) {
                    $stat = '<i class="fa fa-toggle-on fa-2x fa-lg"></i>';
                }
                $data['tgle'] = $stat;
            }

        } catch (\Throwable $e) {
            $data['error'] = $e->getMessage();
        }

        return response()->json($data);
    }
}
