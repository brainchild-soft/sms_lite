<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Operator;
use App\messagein;
use App\messagelog;
use App\messageout;
use App\gateway;
use App\User;
use App\smsrate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $TotalLog= messagelog::count('Id');
        $TotalLog_dl= messagelog::where('StatusCode','=','201')->count('Id');
        $TotalLog_undl= messagelog::where('StatusCode','!=','201')->count('Id');
        $TotalGateway= gateway::count('id');
        $Gateways = gateway::all();
        $Errors= messagelog::select('ErrorCode', 'Gateway')
            ->where('ErrorCode', '>', '0')
            ->where('StatusCode','!=','201')
            ->orderBy('SendTime', 'desc')
           // ->groupBy('Gateway')
            ->get();


        return view('home',
                        compact(
                        'Gateways',
                        'TotalGateway',
                        'TotalLog',
                        'TotalLog_dl',
                        'TotalLog_undl',
                        'Errors'
                    )
                );
               
    }

   
    public function ResetError(Request $request)
    {
        $NewCode = '';
        $ErrorCode=$request->ErrorCode;
        $Gateway=$request->Gateway;
        $Update = DB::update('update messagelog set ErrorCode = ? where Gateway = ? AND ErrorCode = ?',[$NewCode, $Gateway,$ErrorCode]);
        session()->flash('alert', 'Error Code' .$ErrorCode.$Gateway.' Updated Reset For'.$Gateway);
        return redirect('/home');
    }


}
