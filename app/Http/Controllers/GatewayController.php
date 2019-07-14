<?php

namespace App\Http\Controllers;

use App\Notifications\GatewayDisable;
use App\User;
use App\api_user;
use App\gateway;
use App\messagelog;
use App\switch_seting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class GatewayController extends Controller
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

        $Gateways = gateway::all();
        return view('gateway.CustomerGateway', compact('Gateways'));
    }

    public function GatewaySwitch($Gateway, $Action)
    {
        $ApiUser = api_user::find('1');
        return view('switch.GatewaySwitch', 
                    compact(
                        'ApiUser', 
                        'Gateway', 
                        'Action')
                    );
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    $validatedData = $request->validate([
        'Gateway' => 'required|unique:gateways'
    ]);
        $insert = new gateway;
        $insert->Gateway = $request->Gateway;
        $insert->save();
        session()->flash('alert', 'Gateway '.$insert->Gateway.' has successfully added');
        return redirect('/CustomerGateway');
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Customers = User::where('Role', '=', 'Customer')->get();
        $Gateways = messagelog::whereNotExists
                (function ($query) {
                    $query
                    ->select('Gateway')
                    ->from('gateways')
                    ->whereRaw('messagelog.Gateway = gateways.Gateway');
                })
            ->groupBy('messagelog.Gateway')
            ->orderBy('messagelog.Gateway')
            ->get();
        $CustomerGateway = gateway::find($id);
        return view('gateway.CustomerGatewayEdit', 
                        compact(
                            'Customers', 
                            'Gateways', 
                            'CustomerGateway'
                        )
                    );
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
         $validatedData = $request->validate
         ([
            'Gateway' => 'required|unique:gateways'
         ]);
        $insert = gateway::find($id);
        $insert->Gateway = $request->Gateway;
        $insert->save();
        session()->flash('alert', 'Gateway '.$insert->Gateway.' has successfully updated');
        return redirect('/CustomerGateway');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=  gateway::find($id);
        $delete->delete();
        session()->flash('alert',' Deleted Successfully');
        return redirect('/CustomerGateway'); 
    }
}
