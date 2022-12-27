<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageSection;
use App\Models\SectionElement;
use App\Models\SectionGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;


class SectionElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $photos_path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->photos_path   = public_path('/images/section_elements/gallery');
        $this->photos_path_2 = public_path('/images/section_elements/gallery_2');
    }


    public function index()
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $page = Page::find($id);
        $page_section = PageSection::with('page')->where('page_id', $id)->get();
        $sections      = array();

        $list_2        = "";
        $list_3        = "";
        $process_num   = "";
        $basic_elements = "";
        $basic_elements2 = "";
        $map_descp = "";
        $call1_elements = "";
        $call2_elements = "";
        $bgimage_elements = "";
        $flash_elements = "";
        $header_descp_elements = "";
        $directors_message = "";
        $video_descp_elements = "";
        $gallery_elements = "";
        $location_map = "";
        $gallery2_elements = "";
        $contact_info_elements = "";
        $accordian1_elements = "";
        $accordian2_elements = "";
        $slider_list_elements = "";
        $icon_title_elements = "";
        $process_elements = "";
        $video_section_elements = "";

        foreach ($page_section as $section){
            $sections[$section->id] = $section->section_slug;
            if($section->section_slug == 'basic_section'){
                $basic_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            } else if($section->section_slug == 'basic_section2'){
                $basic_elements2 = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }else if($section->section_slug == 'map_and_description'){
                $map_descp = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'call_to_action_1'){
                $call1_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'call_to_action_2'){
                $call2_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'video_section'){
                $video_section_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }
            else if ($section->section_slug == 'background_image_section'){
                $bgimage_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'flash_cards'){
                $flash_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }
            else if ($section->section_slug == 'simple_header_and_description'){
                $header_descp_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            } else if ($section->section_slug == 'directors_message'){
                $directors_message = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'accordion_section'){
                $list_2 = $section->list_number_2;
                $accordian2_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }
            else if ($section->section_slug == 'gallery_section'){
                $gallery_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'gallery_section_2'){
                $gallery2_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'slider_list'){
                $list_3      = $section->list_number_3;
                $slider_list_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }

            else if ($section->section_slug == 'simple_tab'){
                $process_num = $section->list_number_3;
                $process_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }
        }


        return view('backend.pages.section_elements.create',compact( 'page','video_section_elements','directors_message','sections','basic_elements2','process_num','process_elements','map_descp','icon_title_elements','location_map','video_descp_elements','list_2','list_3','basic_elements','call1_elements','gallery2_elements','bgimage_elements','call2_elements','flash_elements','gallery_elements','header_descp_elements','accordian1_elements','accordian2_elements','slider_list_elements','contact_info_elements','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section_name = $request->input('section_name');
        $section_id   = $request->input('page_section_id');
        if($section_name == 'basic_section'){
            $data=[
                'heading'                => $request->input('heading'),
                'page_section_id'        => $section_id,
                'subheading'             => $request->input('subheading'),
                'description'            => $request->input('description'),
                'list_image'             => $request->input('list_image'),
                'button'                 => $request->input('button'),
                'button_link'            => $request->input('button_link'),
                'created_by'             => Auth::user()->id,
            ];
            if(!empty($request->file('image'))){
                $image        = $request->file('image');
                $name         = uniqid().'_basic_'.$image->getClientOriginalName();
                $path         = base_path().'/public/images/section_elements/basic_section/';
                $moved        = Image::make($image->getRealPath())->fit(465, 645)->orientate()->save($path.$name);
                if ($moved){
                    $data['image']= $name;
                }
            }
            $status = SectionElement::create($data);
        }
        else if($section_name == 'directors_message'){
            $data=[
                'heading'                => $request->input('heading'),
                'page_section_id'        => $section_id,
                'extra_heading'             => $request->input('extra_heading'),
                'subheading'             => $request->input('subheading'),
                'description'            => $request->input('description'),
                'created_by'             => Auth::user()->id,
            ];
            if(!empty($request->file('image'))){
                $image        = $request->file('image');
                $name         = uniqid().'_director_'.$image->getClientOriginalName();
                $newname      = str_replace(' ','-',$name);
                $path         = base_path().'/public/images/section_elements/basic_section/';
                $moved        = Image::make($image->getRealPath())->fit(595, 785)->orientate()->save($path.$newname);
                if ($moved){
                    $data['image']= $newname;
                }
            }
            if(!empty($request->file('extra_image'))){
                $image        = $request->file('extra_image');
                $name         = uniqid().'_director_sign_'.$image->getClientOriginalName();
                $path         = base_path().'/public/images/section_elements/basic_section/';
                $moved        = Image::make($image->getRealPath())->orientate()->save($path.$name);
                if ($moved){
                    $data['extra_image']= $name;
                }
            }
            $status = SectionElement::create($data);
        }
        elseif ($section_name == 'video_section'){
            $type = count($request->input('heading'));
            for ($i=0;$i<$type;$i++){
                $data=[
                    'header'                 => $request->input('heading')[$i],
                    'page_section_id'        => $section_id,
                    'description'            => $request->input('description')[$i],
                    'created_by'             => Auth::user()->id,
                ];
                $status = SectionElement::create($data);
            }
        }
        else if($section_name == 'basic_section2'){
            $data=[
                'heading'                => $request->input('heading'),
                'page_section_id'        => $section_id,
                'subheading'             => $request->input('subheading'),
                'description'            => $request->input('description'),
                'button'                 => $request->input('button'),
                'button_link'            => $request->input('button_link'),
                'list_header'            => $request->input('list_header'),
                'extra_link'             => $request->input('extra_link'),
                'extra_heading'          => $request->input('extra_heading'),
                'extra_button'           => $request->input('extra_button'),
                'created_by'             => Auth::user()->id,
            ];
            if(!empty($request->file('image'))){
                $image        = $request->file('image');
                $name         = uniqid().'_basic2_'.$image->getClientOriginalName();
                $path         = base_path().'/public/images/section_elements/basic_section/';
                $moved        = Image::make($image->getRealPath())->fit(505, 480)->orientate()->save($path.$name);
                if ($moved){
                    $data['image']= $name;
                }
            }
            $status = SectionElement::create($data);
        }
        else if($section_name == 'map_and_description'){
            $data=[
                'heading'                => $request->input('heading'),
                'subheading'             => $request->input('subheading'),
                'page_section_id'        => $section_id,
                'description'            => $request->input('description'),
                'button'                 => $request->input('button'),
                'button_link'            => $request->input('button_link'),
                'created_by'             => Auth::user()->id,
            ];
            $status = SectionElement::create($data);
        }
        elseif ($section_name == 'call_to_action_1'){
            $data=[
                'page_section_id'        => $section_id,
                'heading'                => $request->input('heading'),
                'description'            => $request->input('description'),
                'button'                 => $request->input('button'),
                'button_link'            => $request->input('button_link'),
                'created_by'             => Auth::user()->id,
            ];
            $status = SectionElement::create($data);
        }
        elseif ($section_name == 'call_to_action_2'){
            $data=[
                'page_section_id'        => $section_id,
                'heading'                => $request->input('heading'),
                'description'            => $request->input('description'),
                'subheading'             => $request->input('subheading'),
                'list_header'            => $request->input('list_header'),
                'button'                 => $request->input('button'),
                'button_link'            => $request->input('button_link'),
                'created_by'             => Auth::user()->id,
            ];

            if(!empty($request->file('image'))){
                $image        = $request->file('image');
                $name         = uniqid().'_call_action2_'.$image->getClientOriginalName();
                $path         = base_path().'/public/images/section_elements/basic_section/';
                $moved        = Image::make($image->getRealPath())->fit(1895, 572)->orientate()->save($path.$name);
                if ($moved){
                    $data['image']= $name;
                }
            }
            $status = SectionElement::create($data);
        }
        elseif ($section_name == 'background_image_section'){
            $data=[
                'page_section_id'        => $section_id,
                'heading'                => $request->input('heading'),
                'subheading'             => $request->input('subheading'),
                'list_image'             => $request->input('list_image'),
                'description'            => $request->input('description'),
                'list_header'            => $request->input('list_header'),
                'list_description'       => $request->input('list_description'),
                'extra_heading'          => $request->input('extra_heading'),
                'extra_description'      => $request->input('extra_description'),
                'created_by'             => Auth::user()->id,
            ];

            if($request->file('image') !== null) {
                $image = $request->file('image');
                $name = uniqid() . '__background__' . $image->getClientOriginalName();
                $path = base_path() . '/public/images/section_elements/bgimage_section/';
                $moved = Image::make($image->getRealPath())->fit(1900, 930)->orientate()->save($path . $name);
                if ($moved) {
                    $data['image'] = $name;
                }
            }
                $status = SectionElement::create($data);
        }
        elseif ($section_name == 'flash_cards'){
            for ($i=0;$i<3;$i++){
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $data=[
                    'heading'                => $heading,
                    'list_header'            => $request->input('list_header')[$i],
                    'page_section_id'        => $section_id,
                    'list_description'       => $request->input('list_description')[$i],
                    'created_by'             => Auth::user()->id,
                ];
                $status = SectionElement::create($data);
            }
        }
        elseif ($section_name == 'simple_header_and_description'){
            $data=[
                'page_section_id'        => $section_id,
                'heading'                => $request->input('heading'),
                'description'            => $request->input('description'),
                'created_by'             => Auth::user()->id,
            ];
            $status = SectionElement::create($data);
        }
        elseif ($section_name == 'accordion_section'){
                $list2_num   = $request->input('list_number_2');
                for ($i=0;$i<$list2_num;$i++){
                    $heading      =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                    $subheading   =  (array_key_exists($i, $request->input('subheading')) ?  $request->input('subheading')[$i]: Null);
                    $description  =  (array_key_exists($i, $request->input('description')) ?  $request->input('description')[$i]: Null);
                    $data=[
                        'heading'               => $heading,
                        'subheading'            => $subheading,
                        'description'           => $description,
                        'page_section_id'       => $section_id,
                        'list_header'           => $request->input('list_header')[$i],
                        'list_description'      => $request->input('list_description')[$i],
                        'created_by'            => Auth::user()->id,
                    ];
                    $status = SectionElement::create($data);
                }
        }
        elseif ($section_name == 'slider_list'){
            $list3_num   = $request->input('list_number_3');
            for ($i=0;$i<$list3_num;$i++){
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $subheading  =  (array_key_exists($i, $request->input('description')) ?  $request->input('description')[$i]: Null);
                $data=[
                    'heading'               => $heading,
                    'description'           => $subheading,
                    'list_header'           => $request->input('list_header')[$i],
                    'subheading'            => $request->input('subheading')[$i],
                    'page_section_id'       => $section_id,
                    'list_description'      => $request->input('list_description')[$i],
                    'created_by'            => Auth::user()->id,
                ];
                if (array_key_exists($i,$request->file('list_image'))){
                    $image        = $request->file('list_image')[$i];
                    $name         = uniqid().'_list1_'.$image->getClientOriginalName();
                    $thumb        = 'thumb_'.$name;
                    $path         = base_path().'/public/images/section_elements/list_1/';
                    $thumb_path   = base_path().'/public/images/section_elements/list_1/thumb/';
                    $moved        = Image::make($image->getRealPath())->fit(1170, 535)->orientate()->save($path.$name);
                    $thumb        = Image::make($image->getRealPath())->fit(570, 426)->orientate()->save($thumb_path.$thumb);
                    if ($moved && $thumb){
                        $data['list_image']= $name;
                    }
                }
                $status = SectionElement::create($data);
            }
        }
        elseif ($section_name == 'simple_tab'){
            $process_num   = $request->input('list_number_3_process_num');
            for ($i=0;$i<$process_num;$i++){
                $heading     =  (array_key_exists  ($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $description  =  (array_key_exists ($i, $request->input('description')) ?  $request->input('description')[$i]: Null);
                $subheading  =  (array_key_exists  ($i, $request->input('subheading')) ?  $request->input('subheading')[$i]: Null);
                $data=[
                    'heading'               => $heading,
                    'description'           => $description,
                    'subheading'            => $subheading,
                    'list_header'           => $request->input('list_header')[$i],
                    'page_section_id'       => $section_id,
                    'list_description'      => $request->input('list_description')[$i],
                    'list_image'            => $request->input('list_image')[$i],
                    'created_by'            => Auth::user()->id,
                ];
                $status = SectionElement::create($data);
            }
        }


        if($status){
            $response = 'successfully created';
        }
        else{
            $response = 'error';
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section_name = $request->input('section_name');
        $section_id   = $request->input('page_section_id');

        if($section_name == 'basic_section'){
            $basic                      = SectionElement::find($id);
            $basic->heading             = $request->input('heading');
            $basic->page_section_id     = $section_id;
            $basic->subheading          = $request->input('subheading');
            $basic->list_image          = $request->input('list_image');
            $basic->description         = $request->input('description');
            $basic->button              = $request->input('button');
            $basic->button_link         = $request->input('button_link');
            $basic->updated_by          = Auth::user()->id;
            $oldimage                   = $basic->image;

            if (!empty($request->file('image'))){
                $image                = $request->file('image');
                $name                 = uniqid().'_basic_'.$image->getClientOriginalName();
                $path                 = base_path().'/public/images/section_elements/basic_section/';
                $moved                = Image::make($image->getRealPath())->fit(465, 645)->orientate()->save($path.$name);
                if ($moved){
                    $basic->image = $name;
                    if (!empty($oldimage) && file_exists(public_path().'/images/section_elements/basic_section/'.$oldimage)){
                        @unlink(public_path().'/images/section_elements/basic_section/'.$oldimage);
                    }
                }
            }
            $status = $basic->update();
        }
        else if($section_name == 'directors_message'){
            $basic                      = SectionElement::find($id);
            $basic->heading             = $request->input('heading');
            $basic->page_section_id     = $section_id;
            $basic->subheading          = $request->input('subheading');
            $basic->description         = $request->input('description');
            $basic->updated_by          = Auth::user()->id;
            $oldimage                   = $basic->image;
            $signimage                   = $basic->extra_image;

            if (!empty($request->file('image'))){
                $image                = $request->file('image');
                $name                 = uniqid().'_director_'.$image->getClientOriginalName();
                $newname              = str_replace(' ','-',$name);
                $path                 = base_path().'/public/images/section_elements/basic_section/';
                $moved                = Image::make($image->getRealPath())->fit(595, 785)->orientate()->save($path.$newname);
                if ($moved){
                    $basic->image = $newname;
                    if (!empty($oldimage) && file_exists(public_path().'/images/section_elements/basic_section/'.$oldimage)){
                        @unlink(public_path().'/images/section_elements/basic_section/'.$oldimage);
                    }
                }
            }
            if(!empty($request->file('extra_image'))){
                $image        = $request->file('extra_image');
                $name         = uniqid().'_director_sign_'.$image->getClientOriginalName();
                $path         = base_path().'/public/images/section_elements/basic_section/';
                $moved        = Image::make($image->getRealPath())->orientate()->save($path.$name);
                if ($moved){
                    $basic->extra_image = $name;
                    if (!empty($signimage) && file_exists(public_path().'/images/section_elements/basic_section/'.$signimage)){
                        @unlink(public_path().'/images/section_elements/basic_section/'.$signimage);
                    }
                }
            }
            $status = $basic->update();
        }
        elseif($section_name == 'basic_section2'){
            $basic                      = SectionElement::find($id);
            $basic->heading             = $request->input('heading');
            $basic->page_section_id     = $section_id;
            $basic->subheading          = $request->input('subheading');
            $basic->description         = $request->input('description');
            $basic->button              = $request->input('button');
            $basic->button_link         = $request->input('button_link');
            $basic->list_header         = $request->input('list_header');
            $basic->extra_link          = $request->input('extra_link');
            $basic->extra_heading       = $request->input('extra_heading');
            $basic->extra_button        = $request->input('extra_button');
            $basic->updated_by          = Auth::user()->id;
            $oldimage                   = $basic->image;
            $oldimage2                  = $basic->list_header;
            $oldimage3                  = $basic->list_description;

            if (!empty($request->file('image'))){
                $image                = $request->file('image');
                $name                 = uniqid().'_basic2_'.$image->getClientOriginalName();
                $path                 = base_path().'/public/images/section_elements/basic_section/';
                $moved                = Image::make($image->getRealPath())->fit(505, 480)->orientate()->save($path.$name);
                if ($moved){
                    $basic->image = $name;
                    if (!empty($oldimage) && file_exists(public_path().'/images/section_elements/basic_section/'.$oldimage)){
                        @unlink(public_path().'/images/section_elements/basic_section/'.$oldimage);
                    }
                }
            }
            $status = $basic->update();
        }
        elseif($section_name == 'map_and_description'){
            $map                      = SectionElement::find($id);
            $map->heading             = $request->input('heading');
            $map->subheading          = $request->input('subheading');
            $map->page_section_id     = $section_id;
            $map->description         = $request->input('description');
            $map->button              = $request->input('button');
            $map->button_link         = $request->input('button_link');
            $map->updated_by          = Auth::user()->id;
            $status = $map->update();
        }
        elseif ($section_name == 'call_to_action_1'){
            $action                      = SectionElement::find($id);
            $action->page_section_id     = $section_id;
            $action->heading             = $request->input('heading');
            $action->description         = $request->input('description');
            $action->button              = $request->input('button');
            $action->button_link         = $request->input('button_link');
            $action->updated_by          = Auth::user()->id;
            $status                      = $action->update();

        }
        elseif ($section_name == 'call_to_action_2'){
            $action                      = SectionElement::find($id);
            $action->page_section_id     = $section_id;
            $action->heading             = $request->input('heading');
            $action->description         = $request->input('description');
            $action->subheading          = $request->input('subheading');
            $action->list_header         = $request->input('list_header');
            $action->button              = $request->input('button');
            $action->button_link         = $request->input('button_link');
            $action->updated_by          = Auth::user()->id;
            $oldimage                    = $action->image;

            if (!empty($request->file('image'))){
                $image                = $request->file('image');
                $name                 = uniqid().'_call_action2_'.$image->getClientOriginalName();
                $path                 = base_path().'/public/images/section_elements/basic_section/';
                $moved                = Image::make($image->getRealPath())->fit(1895, 572)->orientate()->save($path.$name);
                if ($moved){
                    $action->image = $name;
                    if (!empty($oldimage) && file_exists(public_path().'/images/section_elements/basic_section/'.$oldimage)){
                        @unlink(public_path().'/images/section_elements/basic_section/'.$oldimage);
                    }
                }
            }


            $status                      = $action->update();

        }
        elseif ($section_name == 'background_image_section'){
            $action                      = SectionElement::find($id);
            $action->page_section_id     = $section_id;
            $action->heading             = $request->input('heading');
            $action->subheading          = $request->input('subheading');
            $action->list_image          = $request->input('list_image');
            $action->description         = $request->input('description');
            $action->list_header         = $request->input('list_header');
            $action->list_description    = $request->input('list_description');
            $action->extra_heading       = $request->input('extra_heading');
            $action->extra_description   = $request->input('extra_description');
            $action->updated_by          = Auth::user()->id;
            $oldimage                    = $action->image;


            if($request->file('image') !== null){
                $image        = $request->file('image');
                $name         = uniqid().'__background__'.$image->getClientOriginalName();
                $path         = base_path().'/public/images/section_elements/bgimage_section/';
                $moved        = Image::make($image->getRealPath())->fit(1900, 930)->orientate()->save($path.$name);
                if ($moved){
                    $action->image = $name;
                    if (!empty($oldimage) && file_exists(public_path().'/images/section_elements/bgimage_section/'.$oldimage)){
                        @unlink(public_path().'/images/section_elements/bgimage_section/'.$oldimage);
                    }
                }


            }
            $status                      = $action->update();

        }
        elseif ($section_name == 'simple_header_and_description'){
            $header                      = SectionElement::find($id);
            $header->page_section_id     = $section_id;
            $header->heading             = $request->input('heading');
            $header->description         = $request->input('description');
            $header->updated_by          = Auth::user()->id;
            $status                      = $header->update();
        }

        if($status){
            $response = 'successfully updated';
        }
        else{
            $response = 'error';
        }
        return response()->json($response);
    }

    public function tablistUpdate(Request $request)
    {
        $section_name       = $request->input('section_name');
        $section_id         = $request->input('page_section_id');


        if ($section_name == 'flash_cards') {
            for ($i=0;$i<3;$i++){
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $flash                   = SectionElement::find($request->input('id')[$i]);
                $flash->list_header      = $request->input('list_header')[$i];
                $flash->heading          = $heading;
                $flash->page_section_id  = $section_id;
                $flash->list_description = $request->input('list_description')[$i];
                $flash->updated_by       = Auth::user()->id;
                $oldimage                = $flash->list_image;
                $status                  = $flash->update();
            }

        }
        elseif ($section_name == 'accordion_section') {
            $list2_num       = $request->input('list_number_2');
            $db_elements     = json_decode($request->input('accordion2_elements'),true);
            $db_elements_id  = array_map(function($item){ return $item['id']; }, $db_elements);

            for ($i=0;$i<$list2_num;$i++) {
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $subheading  =  (array_key_exists($i, $request->input('subheading')) ?  $request->input('subheading')[$i]: Null);
                $description  =  (array_key_exists($i, $request->input('description')) ?  $request->input('description')[$i]: Null);
                if($request->input('id')[$i] == null){
                    $data=[
                        'heading'               => $heading,
                        'subheading'            => $subheading,
                        'description'           => $description,
                        'page_section_id'       => $section_id,
                        'list_header'           => $request->input('list_header')[$i],
                        'list_description'      => $request->input('list_description')[$i],
                        'created_by'            => Auth::user()->id,
                    ];
                    $status = SectionElement::create($data);
                }
                else{
                    $accordian2                      = SectionElement::find($request->input('id')[$i]);
                    $accordian2->heading             = $heading;
                    $accordian2->subheading          = $subheading;
                    $accordian2->description         = $description;
                    $accordian2->page_section_id     = $section_id;
                    $accordian2->list_header         = $request->input('list_header')[$i];
                    $accordian2->list_description    = $request->input('list_description')[$i];
                    $accordian2->updated_by          = Auth::user()->id;
                    $status                          = $accordian2->update();
                }
            }

            foreach ($db_elements_id as $key=>$value){
                if(!in_array($value,$request->input('id'))){
                    $delete_element = SectionElement::find($value);
                    $status         = $delete_element->delete();
                }
            }
        }
        elseif ($section_name == 'video_section') {
            $type = count($request->input('heading'));
            $db_elements     = json_decode($request->input('video_elements'),true);
            $db_elements_id  = array_map(function($item){ return $item['id']; }, $db_elements);
            for ($i=0;$i<$type;$i++){
                if($request->input('id')[$i] == null){
                    $data=[
                        'heading'               => $request->input('heading')[$i],
                        'description'           => $request->input('description')[$i],
                        'page_section_id'       => $section_id,
                        'created_by'            => Auth::user()->id,
                    ];
                    $status = SectionElement::create($data);
                }
                else{
                    $video                      = SectionElement::find($request->input('id')[$i]);
                    $video->heading             = $request->input('heading')[$i];
                    $video->description         = $request->input('description')[$i];
                    $video->page_section_id     = $section_id;
                    $video->updated_by          = Auth::user()->id;
                    $status                     = $video->update();
                }
            }
            foreach ($db_elements_id as $key=>$value){
                if(!in_array($value,$request->input('id'))){
                    $delete_element = SectionElement::find($value);
                    $status         = $delete_element->delete();
                }
            }

        }
        elseif ($section_name == 'slider_list') {
            $list3_num   = $request->input('list_number_3');
            $db_elements     = json_decode($request->input('slider_list_elements'),true);
            $db_elements_id  = array_map(function($item){ return $item['id']; }, $db_elements);
            for ($i=0;$i<$list3_num;$i++) {
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $subheading  =  (array_key_exists($i, $request->input('description')) ?  $request->input('description')[$i]: Null);
                if($request->input('id')[$i] == null){
                    $data=[
                        'heading'               => $heading,
                        'description'           => $subheading,
                        'list_header'           => $request->input('list_header')[$i],
                        'page_section_id'       => $section_id,
                        'subheading'            => $request->input('subheading')[$i],
                        'list_description'      => $request->input('list_description')[$i],
                        'created_by'            => Auth::user()->id,
                    ];
                    if (array_key_exists($i,$request->file('list_image'))){
                        $image        = $request->file('list_image')[$i];
                        $name         = uniqid().'_list1_'.$image->getClientOriginalName();
                        $thumb        = 'thumb_'.$name;
                        $path         = base_path().'/public/images/section_elements/list_1/';
                        $thumb_path   = base_path().'/public/images/section_elements/list_1/thumb/';
                        $moved        = Image::make($image->getRealPath())->fit(1170, 535)->orientate()->save($path.$name);
                        $thumb        = Image::make($image->getRealPath())->fit(570, 426)->orientate()->save($thumb_path.$thumb);
                        if ($moved && $thumb){
                            $data['list_image']= $name;
                        }
                    }
                    $status = SectionElement::create($data);
                }
                else{
                    $sliderlist                      = SectionElement::find($request->input('id')[$i]);
                    $sliderlist->heading             = $heading;
                    $sliderlist->description         = $subheading;
                    $sliderlist->list_header         = $request->input('list_header')[$i];
                    $sliderlist->page_section_id     = $section_id;
                    $sliderlist->subheading          = $request->input('subheading')[$i];
                    $sliderlist->list_description    = $request->input('list_description')[$i];
                    $sliderlist->updated_by          = Auth::user()->id;
                    $oldimage                        = $sliderlist->list_image;
                    $thumbimage                      = 'thumb_'.$sliderlist->list_image;

                    if($request->file('list_image') !== null){
                        if (array_key_exists($i,$request->file('list_image'))){
                            $image        = $request->file('list_image')[$i];
                            $name         = uniqid().'_list1_'.$image->getClientOriginalName();
                            $thumb        = 'thumb_'.$name;
                            $path         = base_path().'/public/images/section_elements/list_1/';
                            $thumb_path   = base_path().'/public/images/section_elements/list_1/thumb/';
                            $moved        = Image::make($image->getRealPath())->fit(1170, 535)->orientate()->save($path.$name);
                            $thumb        = Image::make($image->getRealPath())->fit(570, 426)->orientate()->save($thumb_path.$thumb);

                            if ($moved){
                                $sliderlist->list_image = $name;
                                if (!empty($oldimage) && file_exists(public_path().'/images/section_elements/list_1/'.$oldimage)){
                                    @unlink(public_path().'/images/section_elements/list_1/'.$oldimage);
                                }
                                if (!empty($thumbimage) && file_exists(public_path().'/images/section_elements/list_1/thumb/'.$thumbimage)){
                                    @unlink(public_path().'/images/section_elements/list_1/thumb/'.$thumbimage);
                                }
                            }
                        }
                    }
                    $status = $sliderlist->update();
                }
            }


            foreach ($db_elements_id as $key=>$value){
                if(!in_array($value,$request->input('id'))){
                    $delete_element = SectionElement::find($value);
                    if (!empty($delete_element->list_image) && file_exists(public_path().'/images/section_elements/list_1/'.$delete_element->list_image)){
                        @unlink(public_path().'/images/section_elements/list_1/'.$delete_element->list_image);
                    }
                    $status        = $delete_element->delete();
                }
            }

        }
        elseif ($section_name == 'simple_tab') {
            $process_num       = $request->input('list_number_3_process_num');
            $db_elements     = json_decode($request->input('process_list_elements'),true);
            $db_elements_id  = array_map(function($item){ return $item['id']; }, $db_elements);
            for ($i=0;$i<$process_num;$i++) {
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $subheading  =  (array_key_exists($i, $request->input('subheading')) ?  $request->input('subheading')[$i]: Null);
                $description  =  (array_key_exists($i, $request->input('description')) ?  $request->input('description')[$i]: Null);
                if($request->input('id')[$i] == null){
                    $data=[
                        'heading'               => $heading,
                        'description'           => $description,
                        'subheading'            => $subheading,
                        'list_header'           => $request->input('list_header')[$i],
                        'page_section_id'       => $section_id,
                        'list_description'      => $request->input('list_description')[$i],
                        'list_image'            => $request->input('list_image')[$i],
                        'created_by'            => Auth::user()->id,
                    ];
                    $status = SectionElement::create($data);
                }
                else{
                    $process                      = SectionElement::find($request->input('id')[$i]);
                    $process->heading             = $heading;
                    $process->description         = $description;
                    $process->subheading          = $subheading;
                    $process->list_header         = $request->input('list_header')[$i];
                    $process->page_section_id     = $section_id;
                    $process->list_description    = $request->input('list_description')[$i];
                    $process->list_image          = $request->input('list_image')[$i];
                    $process->updated_by          = Auth::user()->id;
                    $status = $process->update();
                }
            }
            foreach ($db_elements_id as $key=>$value){
                if(!in_array($value,$request->input('id'))){
                    $deleteelement = SectionElement::find($value);
                    $status        = $deleteelement->delete();
                }
            }

        }


        if($status){
            $response = 'successfully updated';
        }
        else{
            $response = 'error';
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadGallery(Request $request,$id)
    {
        $page_section                 =  PageSection::with('page')->find($id);
        if($page_section==null || $page_section=="null"){

             return Response::json([
                'message' => 'Page Section ID Not Found'
            ], 400);
        }

        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->photos_path)) {
            mkdir($this->photos_path, 0777);
        }


        for ($i = 0; $i < count($photos); $i++) {
            $photo       = $photos[$i];
            $name        = $page_section->page->slug."_page_gallery_".date('YmdHis') . uniqid();
            $rep_name    = str_replace(' ','_',$name);
            $save_name   = $rep_name . '.' . $photo->getClientOriginalExtension();
            $resize_name = "thumb_".$save_name;


            Image::make($photo)
                ->orientate()
                ->fit(370, 250)
                ->save($this->photos_path . '/' . $resize_name);

            Image::make($photo)
                ->orientate()
                ->save($this->photos_path . '/' . $save_name);

            $photo->move($this->photos_path, $save_name);

            $upload = new SectionGallery();
            $upload->page_section_id = $page_section->id;
            $upload->upload_by = Auth::user()->id;
            $upload->filename = $save_name;
            $upload->resized_name = $resize_name;
            $upload->original_name = basename(pathinfo($photo->getClientOriginalName(),PATHINFO_FILENAME));
            $upload->save();
        }

        return response()->json(['success'=>$save_name]);

    }

    public function uploadGallery2(Request $request,$id)
    {
        $page_section                 =  PageSection::with('page')->find($id);
        if($page_section==null || $page_section=="null"){

            return Response::json([
                'message' => 'Page Section ID Not Found'
            ], 400);
        }

        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->photos_path_2)) {
            mkdir($this->photos_path_2, 0777);
        }


        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];

            $name = $page_section->page->slug."_page_gallery_2_".date('YmdHis') . uniqid();
            $save_name = $name . '.' . $photo->getClientOriginalExtension();
            $resize_name = "Thumb_".$name . '.' . $photo->getClientOriginalExtension();

            Image::make($photo)
                ->orientate()
                // ->resize(600, 550)
                ->save($this->photos_path_2 . '/' . $resize_name);

            $photo->move($this->photos_path_2, $save_name);

            $upload                     = new SectionGallery();
            $upload->page_section_id    = $page_section->id;
            $upload->upload_by          = Auth::user()->id;
            $upload->filename           = $save_name;
            $upload->resized_name       = $resize_name;
            $upload->original_name      = basename(pathinfo($photo->getClientOriginalName(),PATHINFO_FILENAME));
            $upload->save();
        }
        return response()->json(['success'=>$save_name]);

    }

    public function deleteGallery(Request $request)
    {
        $filename = $request->get('filename');
        $uploaded_image = SectionGallery::where('filename', $filename)->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->photos_path . '/' . $uploaded_image->filename;
        $resized_file = $this->photos_path . '/' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            @unlink($file_path);
        }

        if (file_exists($resized_file)) {
            @unlink($resized_file);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['success' => $filename], 200);
    }

    public function deleteGallery2(Request $request)
    {

        $filename       = $request->get('filename');
        $uploaded_image = SectionGallery::where('filename', $filename)->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->photos_path_2 . '/' . $uploaded_image->filename;
        $resized_file = $this->photos_path_2 . '/' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            @unlink($file_path);
        }

        if (file_exists($resized_file)) {
            @unlink($resized_file);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['success' => $filename], 200);
    }

    public function getGallery(Request $request,$id)
    {
        $images = SectionGallery::where('page_section_id',$id)->get()->toArray();
        if (count($images) > 0){
            foreach($images as $image){
                $tableImages[] = $image['filename'];
            }
            $storeFolder = public_path('images/section_elements/gallery/');
            $file_path = public_path('images/section_elements/gallery/');
            $files = scandir($storeFolder);
            foreach ( $files as $file ) {
                if ($file !='.' && $file !='..' && in_array($file,$tableImages)) {
                    $obj['name'] = $file;
                    $file_path = public_path('images/section_elements/gallery/').$file;
                    $obj['size'] = filesize($file_path);
                    $obj['path'] = url('/images/section_elements/gallery/'.$file);
                    $data[] = $obj;
                }

            }
            return response()->json($data);
        }
    }

    public function getGallery2(Request $request,$id)
    {
        $images = SectionGallery::where('page_section_id',$id)->get()->toArray();

        if (count($images) > 0){
            foreach($images as $image){
                $tableImages[] = $image['filename'];
            }
            $storeFolder = public_path('images/section_elements/gallery_2/');
            $file_path = public_path('images/section_elements/gallery_2/');
            $files = scandir($storeFolder);
            foreach ( $files as $file ) {
                if ($file !='.' && $file !='..' && in_array($file,$tableImages)) {
                    $obj['name'] = $file;
                    $file_path = public_path('images/section_elements/gallery_2/').$file;
                    $obj['size'] = filesize($file_path);
                    $obj['path'] = url('/images/section_elements/gallery_2/'.$file);
                    $data[] = $obj;
                }

            }
            return response()->json($data);
        }
    }

}
