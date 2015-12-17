<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use DB;
use App\User;

class UserController extends Controller
{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = $this->auth->user()->id;
        $user = DB::table('users as u')
            ->selectRaw('u.*, u.id as user_id, ut.type_name as type_name')
            ->leftjoin('user_types as ut','u.type_id','=','ut.id')
            ->where('u.id','=',$user_id)
            ->first();

        return View('users.index',[
            'user'  =>  $user
            ]);
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
        //
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
        //

        $input_firstname = $request->get('input_firstname');
        $input_lastname = $request->get('input_lastname');
        $input_nickname = $request->get('input_nickname');
        $input_birthday = $request->get('input_birthday');

        User::where('id','=',$id)
            ->update([
                'firstname' =>  $input_firstname,
                'lastname'  =>  $input_lastname,
                'nickname'  =>  $input_nickname,
                'birthday'  =>  $input_birthday,
                ]);

        return response()->json(['success'=>'success']);
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
}
