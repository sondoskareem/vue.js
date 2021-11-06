<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Admin;
use App\Models\User;
use App\Models\Section;
use Str;
use URL;
use Auth;
use Carbon\Carbon;

class SessionController extends Controller
{
    public function __construct(){

 }

    public function print($id){

        try{

        $Session = Session::findOrFail($id);
        $User =$Session->user;
        return view('Session.print',[
            'Session' => $Session,
            'User' => $User,
        ]);

        }catch (\Throwable $th) {


        }
    }

    public function index($USERID){

        try{
            $Sessions = Session::latest()->get();
            return $Sessions;

        }catch (\Throwable $th) {


        }
    }



    public function store(Request $request , $id){

        // try{
            $this->validateRequest($request);

            $User = User::findOrFail($id);

            $data = $request->all();

            $sheet = $User->sessions()->create($data);

            $sessions = session()->flash('success' , __('success'));
            return response()->json(['msg' => 'success']);

        // }catch (\Throwable $th) {

        // }
    }


    public function edit(Request $request , $Session , $USERID )
    {
        // try{
            $Session = Session::findOrfail($Session);

            $data = $request->all();


            $Session = tap($Session)->update($data);


            // }catch (\Throwable $th) {


            // }
    }

    public function PaidView($id)
    {
        if(request()->ajax()){
            $data = Session::findOrFail($id);
            return response()->json(['result' => $data ]);
        }

    }

    public function PaidSubmit(Request $request)
    {

            $this->validate($request , [
                'paid' => 'required',
            ]);

            $Session = Session::findOrfail($request->hidden_id);
            $data['paid']=$request->paid + $Session->paid;
            $data['recived_by'] = auth('admin')->user()->id;
            $Session->update($data);

            session()->flash('success' , __('success'));
            return  response()->json(['success' => __('success')]);

    }

    public function delete( $Session , $USERID )
    {
        $session = Session::findOrFail($Session);
        Session::destroy($Session);
            return redirect(route('Session.index' ,[$USERID , 'status' =>$session->status]));
    }

    public function getTeeth($val ){

    $teeth = [];
    if($val == 'milk teeth'){
        $teeth = ['51' , '52' , '53' , '54'  ,'55' , '61' , '62' , '63' , '64' , '65' , '71' , '72' , '73' , '74' , '75' , '81' , '82' ,'83' , '84' , '85'];
    }else if($val == 'permanent teeth'){
        $teeth = ['11','12','13','14','15','16','17','18' ,'21','22','23','24','25','26','27','28' ,'31','32','33','34','35','36','37','38' ,'41','42','43','44','45','46','47','48'];
    }

        $output = '';
        $output.='<lable class="col-sm-6 col-form-label ">Choose number</lable>';
        $output.='<div class="form-group s_c2">';
        $output.='<select width="100%" class="select2 square form-control  col-sm-12 " name="tooth_no" style="width:100% !important" id="tooth_no"';
        $output.='<option>'. __('dashboard.model').'</option>';
        foreach($teeth as $thooth){
        $output.='<option';
        $output.=' value="';
        $output.=$thooth;
        $output.='">'.$thooth.'</option>';
        }
        $output.='</select>';
        $output.='</div>';
        return response()->json(['result'=> $output]);
    }

    protected function validateRequest( $request, $options = ''  ){
        return $this->validate($request,[
            'doctor_id' => $options."required|string",
            // 'treatment' => $options."required|string",
            // 'price' => $options."required|string",
            'date' => $options."required|date",
            // 'paid' => $options."required|string",
            // 'notes' => $options."required|string",
            'status' => $options."required|string",
            // 'teeth_type' => $options."required|string",
            // 'tooth_no' => $options."required|string",
            // 'labName' => $options."required|string",
            // 'numberOfUnit' => $options."required|string",
            // 'operationType' => $options."required|string",
            'section_id' => $options. 'required|exists:sections,id',
            ]);
        }

}
