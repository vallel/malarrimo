@extends('admin/layout')

@section('content')

    <h1 class="page-header">Tarifas</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    {{ Form::open(['route' => 'updateFees', 'role' => 'form']) }}
        <table class="table table-striped">
            <tr>
                <th>Concepto</th>
                <th class="col-xs-4">Pesos</th>
                <th class="col-xs-4">Dolares</th>
            </tr>
            @foreach($fees as $fee)
            <tr>
                <td>{{$fee->feeConcept->name}}</td>
                <td>
                    <div class="input-group col-xs-4">
                        <div class="input-group-addon">$</div>
                        <input type="text" name="pesos_fee-{{$fee->id}}" value="{{$fee->pesos_fee}}" class="form-control">
                    </div>
                </td>
                <td>
                    <div class="input-group col-xs-4">
                        <div class="input-group-addon">$</div>
                        <input type="text" name="dollars_fee-{{$fee->id}}" value="{{$fee->dollars_fee}}" class="form-control">
                    </div>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    {{ Form::close() }}

@endsection