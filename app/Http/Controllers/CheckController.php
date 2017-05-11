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
  public function getIndex(Request $request){
        $fecha = Carbon::now()->addWeek()->toDateString();
        $fecha2 = Carbon::now()->subWeek()->toDateString();
        $arrayCheques = Check::where('expiration', '>', $fecha2)->get();
        $arrayCheques = Check::where('expiration', '<', $fecha)->get();
        $total = $arrayCheques->count('beneficiary');
        $totalAmount = $arrayCheques->sum('amount');
        return view('cheques.index')->with('arrayCheques',$arrayCheques)->with('total',$total)->with('totalAmount',$totalAmount);
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

    public function getShowName (Request $request){
      //$nombre = $request->input('name');
      $arrayCheques = Check::where('beneficiary', 'LIKE', $request->name)->get();
      $total = $arrayCheques->count('beneficiary');
      $totalAmount = $arrayCheques->sum('amount');
      return view('cheques.index')->with('arrayCheques',$arrayCheques)->with('total',$total)->with('totalAmount',$totalAmount);
    }

    public function getShowDate (Request $request){
      switch($request->date){
        case '1':
        $fecha = Carbon::now()->addWeek()->toDateString();
        $fecha2 = Carbon::now()->subWeek()->toDateString();
        $arrayCheques = Check::where('expiration', '>', $fecha2)->get();
        $arrayCheques = Check::where('expiration', '<', $fecha)->get();
        $total = $arrayCheques->count('beneficiary');
        $totalAmount = $arrayCheques->sum('amount');
        return view('cheques.index')->with('arrayCheques',$arrayCheques)->with('total',$total)->with('totalAmount',$totalAmount);
        break;
        case '2':
        $fecha = Carbon::now()->toDateString();
        $arrayCheques = Check::where('expiration', '=', $fecha)->get();
        $total = $arrayCheques->count('beneficiary');
        $totalAmount = $arrayCheques->sum('amount');
        return view('cheques.index')->with('arrayCheques',$arrayCheques)->with('total',$total)->with('totalAmount',$totalAmount);
        break;
        case '3':
        $fecha = Carbon::now()->addDay()->toDateString();
        $arrayCheques = Check::where('expiration', '=', $fecha)->get();
        $total = $arrayCheques->count('beneficiary');
        $totalAmount = $arrayCheques->sum('amount');
        return view('cheques.index')->with('arrayCheques',$arrayCheques)->with('total',$total)->with('totalAmount',$totalAmount);
        break;
        case '4':
        $fecha = Carbon::now()->subWeek()->toDateString();
        $fecha2 = Carbon::now()->addWeek()->toDateString();
        $arrayCheques = Check::where('expiration', '>', $fecha2)->get();
        $arrayCheques = Check::where('expiration', '<', $fecha)->get();
        $total = $arrayCheques->count('beneficiary');
        $totalAmount = $arrayCheques->sum('amount');
        return view('cheques.index')->with('arrayCheques',$arrayCheques)->with('total',$total)->with('totalAmount',$totalAmount);
        break;
        case '5':
        $fecha = Carbon::now()->addWeek()->toDateString();
        $fecha2 = Carbon::now()->addWeek(2)->toDateString();
        $arrayCheques = Check::where('expiration', '<', $fecha2)->get();
        $arrayCheques = Check::where('expiration', '>', $fecha)->get();
        $total = $arrayCheques->count('beneficiary');
        $totalAmount = $arrayCheques->sum('amount');
        return view('cheques.index')->with('arrayCheques',$arrayCheques)->with('total',$total)->with('totalAmount',$totalAmount);
        break;

      }

    }

}
