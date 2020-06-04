<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Page\Repositories\PageInterface;
use App\Modules\Banner\Repositories\BannerInterface;
use App\Modules\Course\Repositories\CourseInterface;
use App\Modules\Team\Repositories\TeamInterface;
use App\Modules\ContactUs\Repositories\ContactUsInterface;
use App\Modules\Setting\Repositories\SettingInterface;

class HomeController extends Controller
{

    protected $page;
    protected $banner;
    protected $course;
    protected $team;
    protected $contactus;
    protected $setting;
    
    public function __construct(
            PageInterface $page,
            BannerInterface $banner,
            CourseInterface $course,
            TeamInterface $team,
            ContactUsInterface $contactus,
            SettingInterface $setting
        )

    {
        $this->page = $page;
        $this->banner = $banner;
        $this->course = $course;
        $this->team = $team;
        $this->contactus = $contactus;
        $this->setting = $setting;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['banner'] = $this->banner->findAll();
        $data['we_offer'] = $this->page->getBySlug('we_offer');
        $data['course'] = $this->course->findAll();
        $data['about_neta'] =$this->page->getBySlug('about_us');
        $data['setting'] = $this->setting->find(1);
        return view('home::index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function AboutUs()
    {
        $data['about_neta'] =$this->page->getBySlug('about_us');
        $data['team'] =$this->team->findAll();
        $data['setting'] = $this->setting->find(1);
        return view('home::aboutus',$data);
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function ContactUs(Request $request)
    {
        $input = $request->all(); 
        $data['contact_us'] =$this->page->getBySlug('contact_us');
        $data['message'] = ($input) ? $input['message'] : FALSE;
        $data['setting'] = $this->setting->find(1);  
        return view('home::contactus',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function storeContact(Request $request)
    {
        $data = $request->all();
        
         try{

            $this->contactus->save($data);

            $contact['message'] = 'You Message Store  Successfully';
        }catch(\Throwable $e){
            $contact['message'] = 'Something Wrong With Message';
        }
        
        return redirect(route('contact-us',$contact));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('home::edit');
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
}
