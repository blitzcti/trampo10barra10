<?php

namespace App\Providers;

use App\Color;
use App\Course;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param Dispatcher $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        Schema::defaultStringLength(191);

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $this->loadMenu($event->menu);
        });
    }

    public function loadMenu($menu)
    {
        $courses = Course::all()->sortBy('id');
        $user = Auth::user();

        $menu->add('SISTEMA');
        if ($user->can('systemConfiguration-list')) {
            $menu->add([
                'text' => 'menu.configuration',
                'icon' => 'gear',
                'submenu' => [
                    [
                        'text' => 'menu.configurations', //CTI
                        'route' => 'admin.configuracoes.parametros.index',
                        'icon' => 'wrench',
                        'active' => ['admin/configuracoes/parametros/'],
                    ],
                    [
                        'text' => 'menu.backup',
                        'route' => 'admin.configuracoes.backup.index',
                        'icon' => 'floppy-o',
                        'active' => ['admin/configuracoes/backup/'],
                    ],
                ],
            ]);
        }

        if ($user->can('user-list')) {
            $menu->add([
                'text' => 'menu.users',
                'icon' => 'user',
                'submenu' => [
                    [
                        'text' => 'menu.view',
                        'route' => 'admin.usuario.index',
                        'icon' => 'th-list',
                        'active' => ['admin/usuario/']
                    ],
                    [
                        'text' => 'menu.new',
                        'route' => 'admin.usuario.novo',
                        'icon' => 'edit',
                        'active' => ['admin/usuario/novo']
                    ],
                ]
            ]);
        }

        $menu->add(
            [
                'text' => 'menu.message',
                'route' => 'admin.mensagem.index',
                'icon' => 'envelope',
                'active' => ['admin/mensagem/']
            ],
            [
                'text' => 'menu.help',
                'route' => 'ajuda.index',
                'icon' => 'question-circle',
                'active' => ['ajuda/']
            ]
        );

        if ($user->hasRole('admin')) {
            $menu->add('ADMINISTRACAO');
            if ($user->can('user-list')) {
                $menu->add([
                    'text' => 'menu.courses',
                    'icon' => 'graduation-cap',
                    'submenu' => [
                        [
                            'text' => 'menu.view',
                            'route' => 'admin.curso.index',
                            'icon' => 'th-list',
                            'active' => ['admin/curso/']
                        ],
                        [
                            'text' => 'menu.new',
                            'route' => 'admin.curso.novo',
                            'icon' => 'edit',
                            'active' => ['admin/curso/novo']
                        ],
                        [
                            'text' => 'Coordenadores',
                            'icon' => 'street-view',
                            'submenu' => [
                                [
                                    'text' => 'menu.view',
                                    //'route'  => 'admin.coordenador.index',
                                    'icon' => 'th-list',
                                    'active' => ['admin/coordenador/']
                                ],
                                [
                                    'text' => 'menu.new',
                                    //'route' => 'admin.coordenador.novo',
                                    'icon' => 'edit',
                                    'active' => ['admin/coordenador/novo']
                                ],
                            ]
                        ]
                    ]
                ]);
            }

            $menu->add([
                'text' => 'menu.student',
                'icon' => 'users',
                'submenu' => [
                    [
                        'text' => 'menu.history',
                        'route' => 'aluno.index',
                        'icon' => 'hourglass-1',
                        'active' => ['admin/aluno/']
                    ],
                ]
            ]);

            //Cursos tab
            $menu->add('CURSOS');
            foreach ($courses as $course) {
                if ($course->active) {
                    $color = Color::all()->find($course->id_color);

                    $menu->add([
                        'text' => $course->name,
                        'icon_color' => $color->name
                    ]);
                }
            }
        }

        if ($user->coordinator() != null) {
            $menu->add('COORDENAÇÃO DE ESTÁGIO');

            if ($user->can('company-list')) {
                $menu->add([
                    'text' => 'menu.company',
                    'icon' => 'building',
                    'submenu' => [
                        [
                            'text' => 'menu.view',
                            'route' => 'coordenador.empresa.index',
                            'icon' => 'th-list',
                            'active' => ['coordenador/empresa/']
                        ],
                        [
                            'text' => 'menu.new',
                            'route' => 'coordenador.empresa.novo',
                            'icon' => 'edit',
                            'active' => ['coordenador/empresa/novo']
                        ],
                        [
                            'text' => 'menu.sector',
                            'icon' => 'balance-scale',
                            'submenu' => [
                                [
                                    'text' => 'menu.view',
                                    'route' => 'coordenador.empresa.setor.index',
                                    'icon' => 'th-list',
                                    'active' => ['coordenador/empresa/setor/']
                                ],
                                [
                                    'text' => 'menu.new',
                                    'route' => 'coordenador.empresa.setor.novo',
                                    'icon' => 'edit',
                                    'active' => ['coordenador/empresa/setor/novo']
                                ]
                            ]
                        ]
                    ]
                ]);
            }

            $menu->add([
                'text' => 'menu.internship',
                'icon' => 'id-badge',
                'submenu' => [
                    [
                        'text' => 'menu.view',
                        'route' => 'coordenador.estagio.index',
                        'icon' => 'th-list',
                        'active' => ['coordenador/estagio/']
                    ],
                    [
                        'text' => 'menu.new',
                        'route' => 'coordenador.estagio.novo',
                        'icon' => 'edit',
                        'active' => ['coordenador/estagio/novo']
                    ],
                    [
                        'text' => 'menu.ctps',
                        'route' => 'coordenador.estagio.ctps',
                        'icon' => 'edit',
                        'active' => ['coordenador/estagio/novo']
                    ],
                    [
                        'text' => 'menu.aditive',
                        'icon' => 'plus',
                        'submenu' => [
                            [
                                'text' => 'menu.view',
                                'route' => 'coordenador.estagio.aditivo.index',
                                'icon' => 'th-list',
                                'active' => ['coordenador/estagio/aditivo/']
                            ],
                            [
                                'text' => 'menu.new',
                                'route' => 'coordenador.estagio.aditivo.novo',
                                'icon' => 'edit',
                                'active' => ['coordenador/estagio/aditivo/novo']
                            ],
                        ],
                    ],
                ]
            ]);

            $menu->add([
                'text' => 'menu.report',
                'icon' => 'book',
                'submenu' => [
                    [
                        'text' => 'menu.view',
                        'route' => 'coordenador.relatorio.index',
                        'icon' => 'th-list',
                        'active' => ['coordenador/relatorio/']
                    ],
                    [
                        'text' => 'menu.proposal',
                        'route' => 'coordenador.relatorio.proposta',
                        'icon' => 'edit',
                        'active' => ['coordenador/relatorio/proposta']
                    ],
                    [
                        'text' => 'menu.bimestral',
                        'route' => 'coordenador.relatorio.bimestral',
                        'icon' => 'edit',
                        'active' => ['coordenador/relatorio/bimestral']
                    ],
                    [
                        'text' => 'menu.final',
                        'route' => 'coordenador.relatorio.final',
                        'icon' => 'edit',
                        'active' => ['coordenador/relatorio/final']
                    ],
                ]
            ]);

            $menu->add('ALUNOS');
            $menu->add([
                'text' => 'menu.student',
                'icon' => 'users',
                'submenu' => [
                    [
                        'text' => 'menu.history',
                        'route' => 'aluno.index',
                        'icon' => 'hourglass-1',
                        'active' => ['aluno/']
                    ],
                ]
            ]);
        }
    }
}
