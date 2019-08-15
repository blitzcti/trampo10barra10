@extends('adminlte::page')

@section('title', 'Detalhes do aluno - SGE CTI')

@section('content_header')
    <h1>Detalhes do aluno {{ $student->nome }}</h1>
@stop

@section('content')
    <div class="box box-default">
        <div class="box-body">
            <div class="btn-group" style="display: inline-flex; margin: 0">
                @if($student->internship != null)
                    <a href="{{ route('coordenador.estagio.editar', $student->internship->id) }}"
                       class="btn btn-primary">Editar estágio</a>

                    <a href="{{ route('coordenador.relatorio.bimestral.novo', ['i' => $student->internship->id]) }}"
                       class="btn btn-success">Adicionar relatório bimestral</a>

                    <a href="{{ route('coordenador.relatorio.final.novo', ['i' => $student->internship->id]) }}"
                       class="btn btn-success">Adicionar relatório final</a>

                @else

                    <a href="{{ route('coordenador.estagio.novo', ['s' => $student->matricula]) }}"
                       class="btn btn-success">Novo estágio</a>

                @endif

                @if($student->job != null)
                    <a href="{{ route('coordenador.estagio.trabalho.editar', $student->job->id) }}"
                       class="btn btn-primary">Editar trabalho</a>

                @else

                    <a href="{{ route('coordenador.estagio.trabalho.novo', ['s' => $student->matricula]) }}"
                       class="btn btn-success">Novo trabalho</a>

                @endif
            </div>

            <h3>Dados do aluno</h3>

            <dl class="row">
                <dt class="col-sm-2">RA</dt>
                <dd class="col-sm-10">{{ $student->matricula }}</dd>

                <dt class="col-sm-2">Nome</dt>
                <dd class="col-sm-10">{{ $student->nome }}</dd>

                <dt class="col-sm-2">Curso</dt>
                <dd class="col-sm-10">{{ $student->course->name }}</dd>

                <dt class="col-sm-2">Turma</dt>
                <dd class="col-sm-10">{{ $student->turma }} ({{ $student->turma_ano }})</dd>

                <dt class="col-sm-2">Ano de matrícula</dt>
                <dd class="col-sm-10">{{ $student->year }}</dd>

                <dt class="col-sm-2">Email</dt>
                <dd class="col-sm-10">{{ $student->email }}</dd>

                <dt class="col-sm-2">Email 2</dt>
                <dd class="col-sm-10">{{ $student->email2 }}</dd>
            </dl>

            <hr/>
            <h3>Estágio ativo do aluno</h3>

            @if ($student->internship != null)

                <dl class="row">
                    <dt class="col-sm-2">Empresa</dt>
                    <dd class="col-sm-10">{{ $student->internship->company->name }}</dd>

                    <dt class="col-sm-2">Setor</dt>
                    <dd class="col-sm-10">{{ $student->internship->sector->name }}</dd>

                    <dt class="col-sm-2">Supervisor</dt>
                    <dd class="col-sm-10">{{ $student->internship->supervisor->name }}</dd>

                    <dt class="col-sm-2">Data de início</dt>
                    <dd class="col-sm-10">{{ date("d/m/Y", strtotime($student->internship->start_date)) }}</dd>

                    <dt class="col-sm-2">Data de término</dt>
                    <dd class="col-sm-10">{{ date("d/m/Y", strtotime($student->internship->end_date)) }}</dd>

                    <dt class="col-sm-2">Horas estimadas</dt>
                    <dd class="col-sm-10">{{ $student->internship->estimated_hours }}</dd>
                </dl>

            @else

                <p>Este aluno não possui um estágio ativo no momento.</p>

            @endif

            <hr/>
            <h3>Estágios finalizados do aluno</h3>

            @if(sizeof($student->finishedInternships) == 0)

                <p>O aluno ainda não concluiu um estágio.</p>
                <hr/>

            @endif

            @foreach($student->finishedInternships as $internship)

                <dl class="row">
                    <dt class="col-sm-2">Empresa</dt>
                    <dd class="col-sm-10">{{ $internship->company->name }}</dd>

                    <dt class="col-sm-2">Setor</dt>
                    <dd class="col-sm-10">{{ $internship->sector->name }}</dd>

                    <dt class="col-sm-2">Supervisor</dt>
                    <dd class="col-sm-10">{{ $internship->supervisor->name }}</dd>

                    <dt class="col-sm-2">Data de início</dt>
                    <dd class="col-sm-10">{{ date("d/m/Y", strtotime($internship->start_date)) }}</dd>

                    <dt class="col-sm-2">Data de término</dt>
                    <dd class="col-sm-10">{{ date("d/m/Y", strtotime($internship->final_report->end_date)) }}</dd>

                    <dt class="col-sm-2">Horas concluídas</dt>
                    <dd class="col-sm-10">{{ $internship->final_report->hours_completed }}</dd>

                    <dt class="col-sm-2">Nota final</dt>
                    <dd class="col-sm-10">{{ $internship->final_report->final_grade }}</dd>

                    <dt class="col-sm-2">Número de aprovação</dt>
                    <dd class="col-sm-10">{{ $internship->final_report->approval_number }}</dd>
                </dl>

                <div class="btn-group">
                    <a href="{{ route('coordenador.relatorio.final.pdf', ['id' => $internship->final_report->id]) }}"
                       target="_blank" class="btn btn-default">Imprimir relatório</a>
                </div>

                <hr/>

            @endforeach

            <h3>Trabalhos do aluno</h3>

            @if(sizeof($student->finishedJobs) == 0)

                <p>O aluno ainda não concluiu um trabalho.</p>
                <hr/>

            @endif

            @foreach($student->finishedJobs as $job)

                <dl class="row">
                    <dt class="col-sm-2">Empresa</dt>
                    <dd class="col-sm-10">{{ $job->company->name }}</dd>

                    <dt class="col-sm-2">Setor</dt>
                    <dd class="col-sm-10">{{ $job->sector->name }}</dd>

                    <dt class="col-sm-2">Supervisor</dt>
                    <dd class="col-sm-10">{{ $job->supervisor->name }}</dd>

                    <dt class="col-sm-2">Data de início</dt>
                    <dd class="col-sm-10">{{ date("d/m/Y", strtotime($job->start_date)) }}</dd>

                    <dt class="col-sm-2">Data de término</dt>
                    <dd class="col-sm-10">{{ date("d/m/Y", strtotime($job->end_date)) }}</dd>
                </dl>

                <hr/>

            @endforeach
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection
