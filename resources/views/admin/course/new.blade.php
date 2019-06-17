@extends('adminlte::page')

@section('title', 'Novo curso - SGE CTI')

@section('content_header')
    <h1>Adicionar novo curso</h1>
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
        <form class="form-horizontal" action="{{ route('admin.curso.salvar') }}" method="post">
            @csrf

            <div class="box-body">
                <h3>Dados do curso</h3>

                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nome do curso*</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Informática"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputColor" class="col-sm-4 control-label">Cor do curso*</label>

                            <div class="col-sm-8">
                                <select class="form-control selection" id="inputColor" name="color">

                                    @foreach($colors as $color)

                                        <option value="{{ $color->id }}">
                                            {{ __('colors.' . $color->name) }}
                                        </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputActive" class="col-sm-4 control-label">Ativo*</label>

                            <div class="col-sm-8">
                                <select class="form-control selection" data-minimum-results-for-search="Infinity"
                                        id="inputActive" name="active">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <hr/>
                <h3>Configurações do curso</h3>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputMinYear" class="col-sm-4 control-label">Ano mínimo*</label>

                            <div class="col-sm-8">
                                <select class="form-control selection" data-minimum-results-for-search="Infinity"
                                        id="inputMinYear" name="minYear">
                                    <option value="1">1º ano</option>
                                    <option value="2">2º ano</option>
                                    <option value="3">3º ano</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputMinSemester" class="col-sm-4 control-label">Semestre mínimo*</label>

                            <div class="col-sm-8">
                                <select class="form-control selection" data-minimum-results-for-search="Infinity"
                                        id="inputMinSemester" name="minSemester">
                                    <option value="1">1º semestre</option>
                                    <option value="2">2º semestre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputMinHour" class="col-sm-4 control-label">Horas mínimas*</label>

                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputMinHour" name="minHour"
                                       placeholder="420"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputMinMonth" class="col-sm-4 control-label">Meses mínimos*</label>

                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputMinMonth" name="minMonth"
                                       placeholder="6"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputMinMonthCTPS" class="col-sm-4 control-label">Meses mínimos (CTPS)*</label>

                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputMinMonth" name="minMonthCTPS"
                                       placeholder="6"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputMinMark" class="col-sm-4 control-label">Nota mínima*</label>

                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputMinMark" name="minMark"
                                       placeholder="10" step="0.5"/>
                            </div>
                        </div>
                    </div>
                </div>

                <hr/>

                <h3>Dados do coordenador</h3>

                <div class="form-group">
                    <label for="inputUser" class="col-sm-2 control-label">Coordenador*</label>

                    <div class="col-sm-10">
                        <select class="form-control selection" id="inputUser" name="user">

                            @foreach($users as $user)

                                <option value="{{ $user->id }}">
                                    {{ __($user->name) }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputValidity_ini" class="col-sm-4 control-label">Vigência Início*</label>

                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="inputStart" name="start"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputValidity_fim" class="col-sm-4 control-label">Vigência Fim</label>

                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="inputEnd" name="end"/>
                            </div>
                        </div>
                    </div>
                </div>

                <h4>Botoes de hoje, ano que vem, ...</h4>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Adicionar</button>
                <button type="submit" name="cancel" class="btn btn-default">Cancelar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.selection').select2({
                language: "pt-BR"
            });
        });
    </script>
@endsection
