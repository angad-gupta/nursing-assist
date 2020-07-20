<?php

namespace App\Modules\ContactUs\Http\Controllers;

use App\Modules\ContactUs\Repositories\ContactUsInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ContactUsController extends Controller
{

    protected $contactus;

    public function __construct(ContactUsInterface $contactus)
    {
        $this->contactus = $contactus;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['contactus'] = $this->contactus->findAll($limit = 10, $search);
        return view('contactus::contactus.index', $data);
    }

    public function viewUser(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $contactus = $this->contactus->find($id);
        $data = view('contactus::contactus.view-detail', compact('contactus'))->render();
        return response()->json(['options' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->contactus->delete($id);
            alertify()->success('Contact Deleted Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect(route('contactus.index'));
    }

    public function updateStatus(Request $request)
    {
        $input = $request->all();
        try {
            $this->contactus->update($input['contact_id'], $input);
            alertify()->success('Contact Status Updated Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect(route('contactus.index'));
    }

}
