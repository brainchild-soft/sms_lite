<?php

namespace App\Http\Controllers;

use App\api_user;
use App\switch_seting;
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

        $errorCounts = messagelog::select('ErrorCode', 'Gateway','Id', DB::raw('count("Id") as total'))
                        ->where('ErrorCode', '>', '0')
                        ->where('StatusCode','!=','201')
                        ->orderBy('SendTime', 'desc')
                        ->groupBy('ErrorCode', 'Gateway')
                        ->get();
        if(!empty($errorCounts)){
            foreach($errorCounts as $errorCount){
                $e_count = switch_seting::where('ErrorCode', $errorCount->ErrorCode)->first()->value('Limit');
                if($e_count<= $errorCount->total){
                    $this->serverStop('stop',$errorCount->Gateway);
                }
            }
        }


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

    private function serverStop($command='stop', $gateway){
        $apiUser = api_user::first();
        $headers = array(
            'Content-Type: application/json',
            'Accept:application/json',
        );
//        $url = 'http://209.126.105.236:9710/http/send-server-command?username='.$apiUser->UserName.'&password='.$apiUser->Password.'&command='.$command.'-gateway&gateway='.$gateway.'';
        $url = 'http://209.126.105.236:9710/http/send-server-command?username=admin&password=admin123654&command=stop-gateway&gateway=SMPP GW-DTT';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl = curl_exec($curl);

        $result =  json_decode($curl);
        dd($result);
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
