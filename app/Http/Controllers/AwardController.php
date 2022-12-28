<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path   = public_path('/images/awards');

    }

    public function index()
    {
        $awards = Award::all();
        return view('backend.awards.index',compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'name'                => $request->input('name'),
            'subtitle'            => $request->input('subtitle'),
            'created_by'          => Auth::user()->id,
        ];
        if(!empty($request->file('image'))){
            $image        = $request->file('image');
            $name         = uniqid().'_'.$image->getClientOriginalName();
            if (!is_dir($this->path)) {
                mkdir($this->path, 0777);
            }
            $path         = base_path().'/public/images/awards/';
            $moved        = Image::make($image->getRealPath())->fit(250, 190)->orientate()->save($path.$name);
            if ($moved){
                $data['image']= $name;
            }
        }
        $cat = Award::create($data);
        if($cat){
            Session::flash('success','Award details added successfully');
        }
        else{
            Session::flash('error','Something went wrong. Award detail cannot be added');
        }
        return redirect()->back();
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
        $edit   = Award::find($id);
        return response()->json($edit);
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
        $award                      =  Award::find($id);
        $award->name                =  $request->input('name');
        $award->subtitle            =  $request->input('subtitle');
        $oldimage                   =  $award->image;

        if (!empty($request->file('image'))){
            $image                = $request->file('image');
            $name                 = uniqid().'_'.$image->getClientOriginalName();
            $path                 = base_path().'/public/images/awards/';
            $moved                = Image::make($image->getRealPath())->fit(250, 190)->orientate()->save($path.$name);
            if ($moved){
                $award->image = $name;
                if (!empty($oldimage) && file_exists(public_path().'/images/awards/'.$oldimage)){
                    @unlink(public_path().'/images/awards/'.$oldimage);
                }
            }
        }
        $status = $award->update();
        if($status){
            Session::flash('success','Award detail was updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Award detail could not be Updated');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete             = Award::find($id);
        if (!empty($delete->image) && file_exists(public_path().'/images/awards/'.$delete->image)){
            @unlink(public_path().'/images/awards/'.$delete->image);
        }
        $remove = $delete->delete();
        if($remove){
            $status ='success';
            return response()->json(['status'=>$status,'message'=>'Award details has been removed! ']);        }
        else{
            $status ='error';
            return response()->json(['status'=>$status,'message'=>'Award details could not be removed. Try Again later !']);
        }
    }
}
