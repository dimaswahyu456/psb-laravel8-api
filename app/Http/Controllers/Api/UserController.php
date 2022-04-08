<?php

namespace App\Http\Controllers\Api;

use App\Models\psb_user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new UserResource(psb_user::all());
    }

    public function getuserlogin(Request $request)
    {
     
        
        $username = ($request->username);
        $password = md5(($request->pwd));
        
        dump($username);
        dump($password);
        die;

        $result =  DB::select(
            'select * from psb_users as u
        where u.username ="' . $username. '" AND u.password ="'. $password.'"'
        );
        $login = response()->json(['data' => $result]);
        // dump($username);
        // dump($password);
        //dump($login);
        // dump($result[0]->id);
        // die;
        if (!empty($result))
        {
            $result = [
                'name' => 'getuser',
                'status' =>  'ok',
                'id' => $result[0]->id
            ];
        }
        else
        {
            $result = [
                'name' => 'getuser',
                'status' =>  'null',
               
            ];
        }

        return new UserResource($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd("ayam goreng");
        // dump($request->username);
        // dump($request->password);
        // die;
        //set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $user = psb_user::create([
            'username'     => $request->username,
            'password'     => md5($request->password)
        ]);
        // dump($request->password);
        // dump( md5($request->password));
        // die;
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  psb_user $user
     * @return \Illuminate\Http\Response
     */
    public function show(psb_user $user)
    {
        return new UserResource($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  psb_user $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, psb_user $user)
    {
        // $username = ($user);
        $password = md5(($request->password));
        dump($request);
        dump($request->password);
        dump($request->username);
        dump($password);
        die;
        //set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $user->update([
            'username'     => $request->username,
            'password'     => md5($request->password)
        ]);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  psb_user $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(psb_user $user)
    {
        $user->delete();

        return new UserResource($user);
    }
}
