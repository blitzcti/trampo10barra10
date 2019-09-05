@extends('adminlte::page')

@section('title', 'Convênios - SGE CTI')

@section('content_header')
    <h1>Convênios com o CTI @if(isset($company))
            de {{ $company->name }} {{ $company->fantasy_name != null ? " ($company->fantasy_name)" : '' }} @endif</h1>
@stop

@section('content')
    @if(session()->has('message'))
        <div class="alert {{ session('saved') ? 'alert-success' : 'alert-error' }} alert-dismissible"
             role="alert">
            {{ session()->get('message') }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="box box-default">
        <div class="box-body">
            <a id="addLink" class="btn btn-success"
               href="{{ (isset($company)) ? route('coordenador.empresa.convenio.novo', ['c' => $company->id]) : route('coordenador.empresa.convenio.novo') }}">
                Adicionar convênio
            </a>

            <table id="companies" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col" data-priority="1">ID</th>

                    @if(!isset($company))

                        <th>Empresa</th>

                    @endif

                    <th>Início</th>
                    <th>Término</th>
                    <th>Obervações</th>
                    <th data-priority="2">Ações</th>
                </tr>
                </thead>

                <tbody>

                @foreach($agreements as $agreement)

                    <tr>
                        <th scope="row">{{ $agreement->id }}</th>

                        @if(!isset($company))

                            <td>{{ $agreement->company->name }} {{ $agreement->company->fantasy_name != null ? (" (" . $agreement->company->fantasy_name . ")") : '' }}</td>

                        @endif

                        <td>{{ date("d/m/Y", strtotime($agreement->start_date)) }}</td>
                        <td>{{ date("d/m/Y", strtotime($agreement->end_date)) }}</td>
                        <td>{{ $agreement->observation }}</td>
                        <td>
                            <a href="{{ route('coordenador.empresa.convenio.editar', ['id' => $agreement->id]) }}">Editar</a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        jQuery(() => {
            let table = jQuery("#companies").DataTable({
                language: {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                },
                responsive: true,
                lengthChange: false,
                buttons: [
                    {
                        extend: 'csv',
                        text: '<span class="glyphicon glyphicon-download-alt"></span> CSV',
                        charset: 'UTF-8',
                        fieldSeparator: ';',
                        bom: true,
                        className: 'btn btn-default',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        text: '<span class="glyphicon glyphicon-print"></span> Imprimir',
                        className: 'btn btn-default',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    }
                ],
                initComplete: function () {
                    table.buttons().container().appendTo(jQuery('#companies_wrapper .col-sm-6:eq(0)'));
                    table.buttons().container().addClass('btn-group');
                    jQuery('#addLink').prependTo(table.buttons().container());
                },
            });
        });
    </script>
@endsection
