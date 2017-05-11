<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Check;
use Notification;
use Carbon\Carbon;

class CheckController extends Controller
{
  public function getIndex(){
        $fecha = Carbon::now();
        $arrayCheques = Check::whereDate('expiration', '=', $fecha);
        return view('cheques.index')->with('arrayCheques',$arrayCheques);
    }
    public function getCreate(){
        return view('cheques.create');
    }

    public function postCreate (Request $request){
        $id = $request->input('id');
        $bank = $request->input('bank');
        $folio = $request->input('folio');
        $beneficiary = $request->input('beneficiary');
        $amount = $request->input('amount');
        $expiration = $request->input('expiration');

        $arrayCheques = new Check();
        $arrayCheques->id=$id;
        $arrayCheques->bank=$bank;
        $arrayCheques->folio=$folio;
        $arrayCheques->beneficiary=$beneficiary;
        $arrayCheques->amount=$amount;
        $arrayCheques->expiration=$expiration;
        $arrayCheques->save();
        Notification::success('Cheque Guardado Exitosamente');
        return redirect()->action('CheckController@getIndex');
    }

}
