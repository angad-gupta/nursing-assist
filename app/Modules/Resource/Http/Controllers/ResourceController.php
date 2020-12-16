<?php

namespace App\Modules\Resource\Http\Controllers;

use App\Modules\Resource\Repositories\ResourcesInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ResourceController extends Controller
{
    /**
     * @var ResourcesInterface
     */
    protected $resource;

    public function __construct(ResourcesInterface $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['resources'] = $this->resource->findAll($limit = 20, $search);
        return view('resource::resource.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('resource::resource.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        try {

            if ($request->hasFile('source_name')) {
                $file = $data['source_name'];
                $data['mime_type'] =  $file->getClientMimeType();
                $data['source_name'] = $this->resource->upload($data['source_name']);
            }
           
            $resource = $this->resource->save($data);
            alertify()->success('Resources Added Successfully');

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect(route('resource.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('resource::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['resource'] = $this->resource->find($id);
        return view('resource::resource.edit', $data);
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
        try {

            if ($request->hasFile('source_name')) {
                $file = $data['source_name'];
                $data['mime_type'] =  $file->getClientMimeType();
                $data['source_name'] = $this->resource->upload($data['source_name']);
            }

            $resource = $this->resource->update($id, $data);
            alertify()->success('Resources Updated Successfully');

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect(route('resource.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->resource->delete($id);
            alertify()->success('Resource Deleted Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect(route('resource.index'));
    }
}
