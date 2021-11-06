<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Str;
use URL;
use App\Traits\UploadTrait;
class SectionController extends Controller
{

    public function __construct(){
    }

    public function index(Request $request){

        $Sections = Section::all();
        return view('Section.index',[
            'Sections' => $Sections,
        ]);
    }



    public function create()
    {
        if(request()->ajax()){
            $data = new Section();
            return response()->json(['result' => $data ]);
        }

    }

    public function store(Request $request){

        $this->validateRequest($request);



        $data['description']=$request->description;
        $data['image']=$request->image->store('section','public');


        Section::create($data)->save();

        session()->flash('success' , __('success'));


        return  response()->json(['success' => __('success')]);
    }


    public function edit($id)
    {
        if(request()->ajax()){
            $data = Section::findOrFail($id);
            return response()->json(['result' => $data ]);
        }

    }
    public function update(Request $request)
    {

            $Section = Section::findOrfail($request->hidden_id);

            $data=[];

               if($request->hasFile('image'))
                {
                  $data['image']=$request->image->store('section','public');
                }


                $data['description']=$request->description;

            $Section->update($data);

            session()->flash('success' , __('success'));
            return  response()->json(['success' => __('success')]);

    }
    public function delete($id)

    {
        Section::destroy($id);
        return redirect(route('Section.index'));

    }

    protected function validateRequest( $request, $options = ''  ){
        return $this->validate($request,[
            'description' => $options.'required|string',
            'image' => $options.'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

    }

}
