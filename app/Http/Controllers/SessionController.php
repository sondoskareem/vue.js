<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
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

    public function index(Request $request){

        try{
            $Sessions = Session::with('user')->latest()->get();
            return $Sessions;

        }catch (\Throwable $th) {


        }
    }



    public function store(SessionRequest $request){

        // try{
            $this->validateRequest($request);

            $data = $request->all();

            $session = Session::create($data);
            return 'success';
        // }catch (\Throwable $th) {

        // }
    }


    public function edit(SessionRequest $request , $id )
    {
        // try{
            $Session = Session::findOrfail($id);

            $data = $request->all();


            $Session = tap($Session)->update($data);


            // }catch (\Throwable $th) {


            // }
    }





    public function delete( $Session)
    {
        $session = Session::findOrFail($Session);
        Session::destroy($Session);
        return 'success';
    }


}
