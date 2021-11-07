<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Str;
use URL;
use App\Traits\UploadTrait;
use Exception;

class SectionController extends Controller
{

    public function __construct(){
    }

    public function index(Request $request){

        $Sections = Section::where('status' ,'active')->get();
        return $Sections;
    }




    public function store(Request $request){

        try{
            $this->validateRequest($request);



            $data['name']=$request->name;
            $data['image']=$request->image->store('section','public');


            Section::create($data)->save();

            return 'success';
        }catch(\Throwable $th){

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
            'name' => $options.'required|string',
            'image' => $options.'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

    }

}
