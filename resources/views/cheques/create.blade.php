@extends('layouts.master') @section('content')
<div class="row" style="margin-top:20px">

    <div class="col-md-offset-3 col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center">
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
					Añadir Cheque
				</h3>
            </div>

            <div class="panel-body" style="padding:30px">

                <form method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="text" name="id" id="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bank">Banco</label>
                        <input type="text" name="bank" id="bank" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="folio">Folio</label>
                        <input type="text" name="folio" id="folio" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="beneficiary">Beneficiario</label>
                        <input type="text" name="beneficiary" id="beneficiary" class="form-control">

                        <div class="form-group">
                            <label for="amount">Cantidad</label>
                            <input type="text" name="amount" id="amount" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="expiration">Fecha de Vencimiento (aaaa-mm-dd)</label>
                            <input type="text" name="expiration" id="expiration" class="form-control">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Añadir Cheque
                            </button>
                        </div>

                </form>

                </div>
            </div>
        </div>
    </div>
    @stop
