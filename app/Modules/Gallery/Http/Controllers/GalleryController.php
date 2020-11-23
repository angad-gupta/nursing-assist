<?php

namespace App\Modules\Gallery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Gallery\Repositories\GalleryInterface;

class GalleryController extends Controller
{

    protected $gallery;

    public function __construct(GalleryInterface $gallery)
    {
        $this->gallery = $gallery;
    }

    /**
    * Display a listing of the resource.
    * @return Response 
    */
    public function index(Request $request)
    {
        
        $input = $request->all();
        $data['gallery'] = $this->gallery->findAll($limit= 50,$input);

        return view('gallery::gallery.index',$data);

    }

    /**
    * Show the form for creating a new resource.
    * @return Response
    */
    public function create(Request $request)
    { 
        $input = $request->all();
        $data['is_edit'] = FALSE;

        return view('gallery::gallery.create',$data);
    }

    /**
    * Store a newly created resource in storage.
    * @param  Request $request
    * @return Response
    */
    public function store(Request $request)
    {

        $data = $request->all();

         $folder_files = $request->file('album_image');

        try{

            $albumData = array(
                'album_title' => $data['album_title'],
                'short_content' => $data['short_content'],
                'content' => $data['content'],
                'status' => $data['status'],
                'date' => date('Y-m-d'),
            );

            if ($request->hasFile('thumbnail_image')) {
                $albumData['thumbnail_image'] = $this->gallery->upload($data['thumbnail_image']);
            }

            $albumInfo = $this->gallery->save($albumData);
            $album_id = $albumInfo->id;

            if($request->hasfile('album_image')){
            $AlbumImage = $this->gallery->uploadMultiImages($folder_files, 'album_image');

                foreach ($AlbumImage as $image) {

                    $ImageData =
                        [
                            'album_id' => $album_id,
                            'image_path' => $image,
                        ];
                     $this->gallery->saveGalleryImage($ImageData);
                }
            }

            alertify()->success('Gallery Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }

        return redirect(route('gallery.index'));
    }


    /**
    * Show the specified resource.
    * @return Response
    */
    public function show()
    {
        return view('gallery::show');
    }

    /**
    * Show the form for editing the specified resource.
    * @return Response
    */
    public function edit(Request $request,$id)
    {
        $input = $request->all(); 

        $data['is_edit'] = TRUE;
        $data['gallery'] = $this->gallery->find($id);

        $data['gallery_image'] = $this->gallery->getGalleryImage($id);

        return view('gallery::gallery.edit',$data);
    }

    /**
    * Update the specified resource in storage.
    * @param  Request $request
    * @return Response
    */
    public function update(Request $request,$id)
    {
        $data = $request->all(); 

        try{
            
            $albumData = array(
                'album_title' => $data['album_title'],
                'short_content' => $data['short_content'],
                'content' => $data['content'],
                'status' => $data['status'],
                'date' => date('Y-m-d'),
            );

            if ($request->hasFile('thumbnail_image')) {
                $albumData['thumbnail_image'] = $this->gallery->upload($data['thumbnail_image']);
            }
            
            $this->gallery->update($id, $albumData);
            $album_id = $id;

             $folder_files = $request->file('album_image');

            if($request->hasfile('album_image')){
                $AlbumImage = $this->gallery->uploadMultiImages($folder_files, 'album_image');

                foreach ($AlbumImage as $image) {

                    $ImageData =
                        [
                            'album_id' => $album_id,
                            'image_path' => $image,
                        ];
                     $this->gallery->saveGalleryImage($ImageData);
                }
            }

            alertify()->success('Gallery Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }

        return redirect(route('gallery.index'));
    }

    /**
    * Remove the specified resource from storage.
    * @return Response
    */
    public function destroy()
    {
    }

    public function deleteAlbumImage(Request $request){
        $input = $request->all();

        $image_id = $input['image_id'];

        try{
            $this->gallery->deleteGalleryImages($image_id);


            alertify()->success('Gallery Image Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('gallery.index'));

    }

}
