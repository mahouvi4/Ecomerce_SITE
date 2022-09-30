<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('temp.login_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->password != $request->password2){
            return response()->json(['status'=>400,'message'=>'Mot de passe Incorrect!!']);
        }elseif(empty($request->email) || empty($request->name) || empty($request->password) || empty($request->password2)){
                return response()->json(['status'=>300,'message'=>'Veillez remplir tous les champs!!']);
     }else{
            $register = new User();
            $register->email=$request->email;
            $register->name=$request->name;
            $register->password=$request->password;
            $register->save();
            if(User::where(['email'=>$request->email,'password'=>$request->password])->count()>0){
                $info_user = User::where(['email'=>$request->email,'password'=>$request->password])->get();
                session(['info_user'=>$info_user]);
                return response()->json(['status'=>200,'message'=>'success']);

            }


        }
}
    

public function login_user(Request $request)
{
      if(User::where(['email'=>$request->email, 'password'=>$request->password])->count()>0){
        $info_user = User::where(['email'=>$request->email, 'password'=>$request->password])->get();
        session(['info_user'=>$info_user]);
        return response()->json(['status'=>200,'message'=>'success']);
      }else{
         return response()->json(['status'=>300,'message'=>'Email/Mot de passe Incorrecte. veillez reessayer!!!']);
      }
}





public function sedeconnecter(){
    session()->forget('info_user');
  return response()->json();
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
