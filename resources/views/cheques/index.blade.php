@extends('layouts.master') @section('content')
<div class="row">

  <div class="panel-body" style="padding:30px">
  <form class="form-inline" method="GET" action="{{action('CheckController@getShowName')}}">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <label class="sr-only" for="name">Filtrar por beneficiario</label>
    <input type="text" class="form-control" name ="name" id="name" placeholder="Nombre">

    <button type="submit" class="btn btn-primary">Buscar</button>
  </form>
  </div>

      <form class="form-inline" method="GET" action="{{action('CheckController@getShowDate')}}"> 
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <label class="mr-sm-2" for="date">Filtrar por fecha de Vencimiento</label>
      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name= "date" id="date">
      <option selected>Escoge...</option>
      <option value="1">Esta Semana</option>
      <option value="2">Hoy</option>
      <option value="3">Mañana</option>
      <option value="4">Semana Pasada</option>
      <option value="5">Siguiente Semana</option>
    </select>

    <button type="submit" class="btn btn-primary">Buscar</button>

  </div>


</form>
</div>
<br>

      <table class="table table-bordered">
        <thead class="thead-inverse">
    <tr>
      <th>Banco</th>
      <th>Folio</th>
      <th>Beneficiario</th>
      <th>Cantidad</th>
      <th>Fecha de Vencimiento</th>
    </tr>
  </thead>

  <tbody>
    @foreach( $arrayCheques as $key => $cheque )
    <tr>
      <th>{{$cheque->bank}}</th>
      <td>{{$cheque->folio}}</td>
      <td>{{$cheque->beneficiary}}</td>
      <td>{{$cheque->amount}}</td>
      <td>{{$cheque->expiration}}</td>
    </tr>
        @endforeach
  </tbody>
</table>

<br>
<h5><b>Total de Cheques Mostrados: <b>{{$total}}</h5>
  <br>
  <h5><b>Cantidad total de Cheques Mostrados: <b>{{$totalAmount}}</h5>

</div>

@stop
