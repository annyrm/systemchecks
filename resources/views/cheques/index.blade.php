@extends('layouts.master') @section('content')
<div class="row">
  <form class="form-inline" method="GET">
    <label class="sr-only" for="beneficiario">Beneficiario</label>
    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="name" placeholder="Nombre">

      <label class="mr-sm-2" for="fecha">Fecha de Vencimiento</label>
      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="date">
      <option selected>Escoge...</option>
      <option value="1">Esta Semana</option>
      <option value="2">Hoy</option>
      <option value="3">Mañana</option>
      <option value="4">Semana Pasada</option>
      <option value="5">Siguiente Semana</option>
    </select>

<button type="submit" class="btn btn-primary">Buscar</button>
</form>
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


</div>

@stop
