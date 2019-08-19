@extends('adminlte::page')

@section('title', 'Ajuda - SGE CTI')]

@section('css')
    <link rel="stylesheet" href="{{ asset('css/help.css') }}">
@endsection

@section('content_header')
    <h1>Ajuda</h1>
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

            <?php
            $t1 = ['Configurações do sistema', 'Funcionalidades extras', 'Página inicial', 'Funcionalidades do sistema'];

            $t2 =
                [
                    [
                        ['Parâmetros do sistema',
                            '<h4>Funcionalidade:<h4>
                            <h5>Dados e informações sobre a Instituição, com funções de download de planilhas e impressão.</h5>

                            <img src="../img/help/parametros_sist/Parametros-add.png">
                            <br>
                            A opção “Adicionar parâmetros” permite que você cadastre uma nova instituição no sistema.
                            <br>
                            <br>

                            <img src="../img/help/parametros_sist/New parametros-dados.png">
                            <br>
                            Para realizar o cadastro, utilize os campos em “Dados do parâmetro” para adicionar
                            informações sobre a nova instituição.
                            <br>
                            <br>

                            <img src="../img/help/parametros_sist/New parametros-adicionar.png">
                            <br>
                            Após preencher, clique em “Adicionar” para salvar a nova instituição no banco de dados.
                            <br>
                            <br>

                            <img src="../img/help/parametros_sist/Parametros-CSV.png">
                            <br>
                            Clicando na opção “CSV”, você pode realizar o download da planilha, que poderá ser visualizada e manipulada utilizando softwares como o libre office calc ou excel.
                            <br>
                            <br>

                            <img src="../img/help/parametros_sist/Parametros-down.png">
                            <br>
                            Clicando na opção “Imprimir” você pode imprimir a planilha de parâmetros do sistema.
                            <br>
                            <br>

                            <img src="../img/help/parametros_sist/Parametros-dados.png">
                            <br>
                            Nessa tabela, você visualiza os parâmetros já cadastrados no banco de dados.
                            <br>
                            <br>

                            <img src="../img/help/parametros_sist/Parametros-anteprox.png">
                            <br>
                            Os botões “Anterior” e “Próxima” permitem trocar as páginas quando determinado número de registros for atingido.
                            <br>
                            <br>

                            <img src="../img/help/parametros_sist/Parametros-pesq.png">
                            <br>
                            Para explorar os registros, você pode utilizar a barra de pesquisa ou a navegação por páginas.
                            <br>
                            <br>
                            ',
                            '(VÍDEO)',
                        ],
                        ['Backup do sistema',
                            '<h4>Funcionalidade:<h4>
                            <h5>Salvamento de arquivos que pode ser programado para que ocorra automaticamente e restaurar arquivos antigos .JSON.</h5>

                            <img src="../img/help/Backup/Backup .png">
                            <br>
                            Ao clicar em “Fazer backup”, o usuário tem a possibilidade de baixar o conteúdo do banco de dados em formato JSON.
                            <br>
                            <br>

                            <img src="../img/help/Backup/agendar backup .png">
                            <br>
                            Na opção “Agendar Backup”, o usuário tem a possibilidade de escolher os dias da semana e horário em que o salvamento de dados será feito.
                            <br>
                            <br>

                            <img src="../img/help/Backup/salvar backup .png">
                            <br>
                            Em “Salvar”, a operação é concluída.
                            <br>
                            <br>

                            <img src="../img/help/Backup/restauração .png">
                            <br>
                            Em “Restaurar”, o usuário poderá restaurar a estrutura de dados para um backup anterior já salvo.
                            <br>
                            <br>

                            <img src="../img/help/Backup/restaurar backup.png">
                            <br>
                            A opção “Escolher arquivo” permite que um arquivo de backup seja carregado diretamente da pasta de arquivos.
                            <br>
                            <br>

                            <img src="../img/help/Backup/restaurar backup restaurar.png">
                            <br>
                            O botão “Restaurar” completa a operação.
                            <br>
                            <br>
                            ',
                            '(VÍDEO)',
                        ],
//////////////////////////////////////////NÃO ESQUECE AQUI////////////////////////////////////////////
                        ['Configurações gerais do curso',
                            '<img src="../img/help/Cursos/Configgerais do curso.png">
                            <br>
                            O botão “Restaurar” completa a operação.
                            <br>
                            <br>',
                            '(VÍDEO)',
                        ],
                    ],
                    [
                        ['Mensagem',
                            '(TUTORIAL)',
                            '(VÍDEO)',
                        ],
                        ['Logs',
                            '
                            <img src="../img/help/Logs/logs.png">
                            <br>
                            Essa tabela disponibiliza o monitoramento de todas as funções desempenhadas no sistema, que serão registradas no banco de dados por segurança e chance de recuperação de dados excluídos por engano.
                            <br>
                            <br>

                            <img src="../img/help/Logs/baixar log.png">
                            <br>
                             Na opção “Baixar Log” você consegue baixar toda a planilha de logs.
                            <br>
                            <br>

                            <img src="../img/help/Logs/limpar log.png">
                            <br>
                             Na opção “Limpar Log” você limpa toda a tabela de logs, porém os dados continuam no servidor.
                            <br>
                            <br>

                            <img src="../img/help/Logs/excluir log.png">
                            <br>
                             Na opção “Excluir Log” você limpa toda a tabela de logs, e também exclui os dados do servidor.
                            <br>
                            <br>

                            <img src="../img/help/Logs/pesquisar log.png">
                            <br>
                             Na opção “Pesquisar” você pode pesquisar algum log em específico.
                            <br>
                            <br>
                            ',
                            '(VÍDEO)',
                        ],
                    ],
                    [
                        ['Notificações',
                            '
                            <img src="../img/help/notificações.png">
                            <br>
                             Nesse espaço aparecerão ao usuário notificações relativas a mensagens de coordenadores, vagas de estágio, novidades e informações.
                            <br>
                            <br>
                            ',
                            '(VÍDEO)',
                        ],
                    ],
                    [
                        ['Estágio',
                            '(TUTORIAL)',
                            '(VÍDEO)',
                        ],
                        ['Cursos',
                            '
                            <h3>Visualizar cursos</h3><br>
                            <img src="../img/help/Cursos/cursos.png">
                            <br>
                             Nessa página o usuário terá a possibilidade de observar os detalhes, fazer edições, adicionar coordenadores e encaminha para a página de configurações do curso selecionado.
                            <br>
                            <br>

                            <img src="../img/help/Cursos/cursos anteprox.png">
                            <br>
                            Os botões “Anterior” e “Próxima” permitem trocar as páginas quando determinado número de registros for atingido.
                            <br>
                            <br>

                            <img src="../img/help/Cursos/down curso.png">
                            <br>
                            Neste campo destacado, o usuário poderá fazer o download de uma planilha que contém os nome de todos os coordenadores,informando os cursos correspondentes, assim como a data do seu ingresso na coordenadoria e do seu egresso.
                            <br>
                            <br>

                            <img src="../img/help/Cursos/imprimi curso.png">
                            <br>
                            Através deste campo destacado, o usuário poderá imprimir e até mesmo criar um arquivo PDF em formato de planilha, assim como salvar no Google Drive tais informações.
                            <br>
                            <br>

                            <img src="../img/help/Cursos/pesquisar curso.png">
                            <br>
                            Na barra pesquisa, o usuário poderá pesquisar o curso que deseja encontrar, podendo colocar o nome inteiro ou parcialmente.
                            <br>
                            <br>

                             <h3>Novo curso</h3><br>

                            <img src="../img/help/Cursos/add curso.png">
                            <br>
                            Neste campo, há a possibilidade de adicionar um novo curso à tabela.
                            <br>
                            <br>

                            <img src="../img/help/Cursos/add new curso.png">
                            <br>
                            Nesse campo o usuário poderá adicionar as informações básicas do curso.
                            <br>
                            <br>

                            <img src="../img/help/Cursos/cancel new curso (1).png">
                            <br>
                            Este campo trará a possibilidade do usuário cancelar a ação ”adicionar novo curso”, caso tenha ocorrido algum contratempo.
                            <br>
                            <br>

                            <img src="../img/help/Cursos/adicionar botão new curso (1).png">
                            <br>
                            Este campo é a confirmação do ato “Adicionar novo Curso”, na qual salvará os dados no Banco.
                            <br>
                            <br>

                            <img src="../img/help/Cursos/config new curso (1).png">
                            <br>
                            Nesse campo o usuário poderá adicionar as configurações do curso.
                            <br>
                            <br>

                            <img src="../img/help/Cursos/cancel config new curso (1).png">
                            <br>
                            Este campo trará a possibilidade do usuário cancelar as configurações do curso, caso tenha ocorrido algum contratempo.
                            <br>
                            <br>

                            <img src="../img/help/Cursos/adicionar botão config new curso (1).png">
                            <br>
                            Este campo é a confirmação para adicionar as configurações do curso, na qual salvará os dados no Banco.
                            <br>
                            <br>
                            ',
                            '(VÍDEO)',
                        ],
                        ['Usuários',
                            '
                            <h3>Visualizar usuário</h3><br>
                            <img src="../img/help/Usuarios/new user-dados.png">
                            <br>
                            Nesta tabela, é possível visualizar  o id dos usuários, nome, email, cargo e também há a possibilidade de editar as informações.
                            <br>
                            <br>

                            <img src="../img/help/Usuarios/new user-anteprox.png">
                            <br>
                            Os botões “Anterior” e “Próxima” permitem trocar as páginas quando determinado número de registros for atingido.
                            <br>
                            <br>

                            <img src="../img/help/Usuarios/new user-down.png">
                            <br>
                            Nesta opção, o usuário tem a opção de baixar a planilha de usuários.
                            <br>
                            <br>

                            <img src="../img/help/Usuarios/new user-impri.png">
                            <br>
                            Nesta área é possível imprimir as informações apresentadas na tabela de usuários.
                            <br>
                            <br>

                            <img src="../img/help/Usuarios/new user-pesquisar.png">
                            <br>
                            A área de pesquisa permite pesquisar informações sobre usuários.
                            <br>
                            <br>

                            <h3>Novo usuário</h3><br>
                            <img src="../img/help/Usuarios/new user-pesquisar.png">
                            <br>
                            Neste campo, há a possibilidade de adicionar um novo usuário à tabela.
                            <br>
                            <br>
                            ',
                            '(VÍDEO)',
                        ],
                        ['Alunos',
                            '(TUTORIAL)',
                            '(VÍDEO)',
                        ],
                        ['Empresas',
                            '(TUTORIAL)',
                            '(VÍDEO)',
                        ],

                    ]
                ];

            ?>

            <?php
            for($n1 = 0; $n1 < sizeof($t1); $n1++)
            {
            $i1 = $n1 + 1;
            ?>

            <section class="accordion">
                <input type="checkbox" name="collapse" id="handle<?php echo $i1; ?>">
                <h4 class="handle">
                    <label for="handle<?php echo $i1; ?>"><b><?php echo $i1.'.'; ?></b> <?php echo $t1[$n1]; ?></label>
                </h4>
                <div class="hcontent">
                    <?php

                    for($n2 = 0; $n2 < sizeof($t2[$n1]); $n2++)
                    {
                    $i2 = $n2 + 1;
                    ?>

                    <section class="accordion">
                        <input type="checkbox" name="collapse" id="handle<?php echo $i1.'.'.$i2; ?>">
                        <h4 class="handle">
                            <label for="handle<?php echo $i1.'.'.$i2; ?>"><b><?php echo $i1.'.'.$i2.'.'; ?></b> <?php echo $t2[$n1][$n2][0]; ?></label>
                        </h4>
                        <div class="hcontent">
                            <div class="tabs">
                                <div id="tab<?php echo $i1.'.'.$i2; ?>.2" class="tab">
                                    <ul class="nav nav-tabs">
                                        <li><a href="#tab<?php echo $i1.'.'.$i2; ?>.1">Tutorial</a></li>
                                        <li class="active"><a href="#tab<?php echo $i1.'.'.$i2; ?>.2">Vídeo</a></li>
                                    </ul>

                                    <p>
                                        <?php echo $t2[$n1][$n2][2]; ?>
                                    </p>
                                </div>


                                <div id="tab<?php echo $i1.'.'.$i2; ?>.1" class="tab">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab<?php echo $i1.'.'.$i2; ?>.1">Tutorial</a></li>
                                        <li><a href="#tab<?php echo $i1.'.'.$i2; ?>.2">Vídeo</a></li>
                                    </ul>

                                    <p>
                                        <?php echo $t2[$n1][$n2][1]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <?php
                    }
                    ?>
                </div>
            </section>

            <?php
            }
            ?>

        </div>
    </div>
@endsection

@section('js')
    <!--
    <script src="https://kit.fontawesome.com/085f790a05.js"></script>
    !-->



@endsection
