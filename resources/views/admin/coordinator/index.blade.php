@extends('adminlte::page')

@section('title', 'Coordenadores - SGE CTI')

@section('content_header')
    <h1>Coordenadores</h1>
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
                <a id="addLink" href="{{ route('admin.coordenador.novo') }}"
                   class="btn btn-success">Adicionar coordenador</a>

            <table id="coordinators" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($coordinators as $coordinator)

                    <tr>
                        <th scope="row">{{ $coordinator->id }}</th>
                        <td>{{ $coordinator->user->name }}</td>
                        <td>{{ $coordinator->course->name }}</td>
                        <td>{{ date("d/m/Y", strtotime($coordinator->start_date)) }}</td>
                        <td>{{ $coordinator->end_date != null ? date("d/m/Y", strtotime($coordinator->end_date)) : 'Indefinido' }}</td>

                        <td>
                            <a href="{{ route('admin.coordenador.editar', ['id' => $coordinator->id]) }}">Editar</a>
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
        jQuery(function () {
            let table = jQuery("#coordinators").DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                },
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
                    table.buttons().container().appendTo($('#coordinators_wrapper .col-sm-6:eq(0)'));
                    table.buttons().container().addClass('btn-group');
                    jQuery('#addLink').prependTo(table.buttons().container());
                },
            });
        });
    </script>
@endsection
