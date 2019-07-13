<?php

namespace App\Http\Controllers;

use App\switch_seting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SwitchController extends Controller
{


     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Settings = switch_seting::all();
        $Role=Auth::user()->Role;
        return view('gateway.SwitchSetting', compact('Settings', 'Role'));
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
        $insert = new switch_seting;
        $insert->ErrorCode = $request->ErrorCode;
        $insert->ErrorName = $request->ErrorName;
        $insert->Limit = $request->Limit;
        $insert->save();
        session()->flash('alert', 'Error Code '.$insert->ErrorCode.' set with limit '.$insert->Limit.' added successfully');
        return redirect('/SwitchSetting');
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
        $Setting = switch_seting::find($id);
        return view('gateway.SwitchSettingEdit', compact('Setting'));
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
        $insert = switch_seting::find($id);
        $insert->ErrorCode = $request->ErrorCode;
        $insert->ErrorName = $request->ErrorName;
        $insert->Limit = $request->Limit;
        $insert->save();
        session()->flash('alert', 'Error Code '.$insert->ErrorCode.' set with limit '.$insert->Limit.' updated successfully');
        return redirect('/SwitchSetting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=  switch_seting::find($id);
        $delete->delete();
        session()->flash('alert', ' Deleted Successfully');
        return redirect('/SwitchSetting'); 
    }
}
