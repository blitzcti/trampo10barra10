@extends('adminlte::page')

@section('title', 'Nova configuracao - SGE CTI')

@section('content_header')
    <h1>Adicionar nova configuração do curso <a href="{{ route('curso.editar', ['id' => $course->id]) }}">{{ $course->name }}</a></h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box box-default">
        <form class="form-horizontal" action="{{ route('curso.configuracao.salvar', $course->id) }}" method="post">
            @csrf

            <div class="box-body">
                <div class="form-group">
                    <label for="inputMinYear" class="col-sm-2 control-label">Ano mínimo</label>

                    <div class="col-sm-10">
                        <select class="form-control selection" id="inputMinYear" name="minYear">
                            <option value="1">1º Ano</option>
                            <option value="2">2º Ano</option>
                            <option value="3">3º Ano</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMinSemester" class="col-sm-2 control-label">Semestre mínimo</label>

                    <div class="col-sm-10">
                        <select class="form-control selection" id="inputMinSemester" name="minSemester">
                            <option value="1">1º Semestre
                            </option>
                            <option value="2">2º Semestre
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMinHour" class="col-sm-2 control-label">Horas mínimas</label>

                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputMinHour" name="minHour" placeholder="420"
                               min="1"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMinMonth" class="col-sm-2 control-label">Meses mínimos</label>

                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputMinMonth" name="minMonth" placeholder="6"
                               min="1"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMinMonthCTPS" class="col-sm-2 control-label">Meses mínimos (CTPS)</label>

                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputMinMonth" name="minMonthCTPS" placeholder="6"
                               min="1"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMinMark" class="col-sm-2 control-label">Nota mínima</label>

                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputMinMark" name="minMark" placeholder="10"
                               min="0" max="10" step="0.5"/>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="cancel" class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-primary pull-right">Adicionar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.selection').select2({
                language: "pt-br"
            });
        });
    </script>
@endsection
