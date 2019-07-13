<?php

namespace App\Http\Controllers;

use App\api_user;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ApiUser= api_user::find('1');
        return view('users.api_user', compact('ApiUser'));
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
        
        $insert = new api_user;
        $insert->UserName = $request->UserName;
        $insert->Password = $request->Password;
        $insert->Url = $request->Url;
        $insert->save();
        session()->flash('alert', 'API User '.$insert->UserName.' has successfully added for '.$insert->Url);
        return redirect('/ApiUser');
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
        $update = api_user::find($id);        
        $update->UserName = $request->UserName;
        $update->Password = $request->Password;
        $update->Url = $request->Url;
        $update->save();
        session()->flash('alert', 'API User '.$request->UserName.' has successfully save for '.$update->Url);
        return redirect('/ApiUser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = api_user::find($id);
        $delete->delete();
        session()->flash('alert', 'API User successfully delete ');
        return redirect('/ApiUser');

    }
}
