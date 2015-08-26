@extends('admin/layout')

@section('appendScripts')
    {{ HTML::script('js/admin.fees.js') }}
@endsection

@section('content')

    <h1 class="page-header">Tarifas</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    {{ Form::open(['route' => 'updateFees', 'role' => 'form']) }}
        <table class="table">
            <tr class="table-headers">
                <th>Concepto</th>
                <th colspan="2" class="text-center">Tarifa normal</th>
                <th colspan="2" class="text-center">Temporada alta</th>
            </tr>
            @foreach($fees as $group)
                <tr class="fee-group-name-row">
                    <td>{{$group->getName()}}</td>
                    <td class="text-center">Pesos</td>
                    <td class="text-center">Dolares</td>
                    <td class="text-center">Pesos</td>
                    <td class="text-center">Dolares</td>
                </tr>
                @foreach($group->getFees() as $fee)
                <tr>
                    <td>{{$fee->getName()}}</td>
                    <td>
                        <div class="input-group fee-field">
                            <div class="input-group-addon">$</div>
                            <input type="text" name="pesos_fee-{{$fee->getId()}}" value="{{$fee->getPesosFee()}}" class="form-control numeric-input">
                        </div>
                    </td>
                    <td>
                        <div class="input-group fee-field">
                            <div class="input-group-addon">$</div>
                            <input type="text" name="dollars_fee-{{$fee->getId()}}" value="{{$fee->getDollarsFee()}}" class="form-control numeric-input">
                        </div>
                    </td>
                    <td>
                        <div class="input-group fee-field">
                            <div class="input-group-addon">$</div>
                            <input type="text" name="pesos_fee_high-{{$fee->getId()}}" value="{{$fee->getPesosFeeHigh()}}" class="form-control numeric-input">
                        </div>
                    </td>
                    <td>
                        <div class="input-group fee-field">
                            <div class="input-group-addon">$</div>
                            <input type="text" name="dollars_fee_high-{{$fee->getId()}}" value="{{$fee->getDollarsFeeHigh()}}" class="form-control numeric-input">
                        </div>
                    </td>
                </tr>
                @endforeach
            @endforeach
        </table>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    {{ Form::close() }}

@endsection