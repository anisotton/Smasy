<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Layout settings
| -------------------------------------------------------------------------
| Your config the Matrix layout .
|
|
*/
$config = array(
    'head' => array(
        'title' => 'Smasy',
        'stylesheets' => array('assets/css/uniform.css','assets/css/smasy/smasy.css'),
        'charset' => 'UTF-8',
        'favicon' => 'assets/img/favicon.ico',
        'scripts' => array('assets/js/jquery.uniform.js','assets/js/masked.js'),
    ),
    'footer' => array(
        'title' => 'Smasy',
        'scripts' => array('assets/js/smasy/smasy.js'),
    ),
    'navbar' => array(
        'search' => false,
        'menu' => array('user' => array(
                    'label' => 'Minha conta',
                    'href' => base_url().'smasy/user',
                    'icon' => 'fa-user',
                ),
                'logout' => array(
                    'label' => 'Sair',
                    'href' => base_url().'smasy/logout',
                    'icon' => 'fa-sign-out',
                ),
        ),
    ),
    'menu' => array(
        'home' => array(
            'label' => 'Painel',
            'href' => base_url(),
            'icon' => 'fa-home',
        ),
        'pessoas' => array(
            'label' => 'Pessoas',
            'href' => base_url().'pessoas',
            'icon' => 'fa-users',
        ),
        'alunos' => array(
            'label' => 'Alunos',
            'href' => base_url().'alunos',
            'icon' => 'fa-graduation-cap',
        ),
        'professores' => array(
            'label' => 'Professores',
            'href' => base_url().'professores',
            'icon' => 'fa-address-book',
        ),
        'turmas' => array(
            'label' => 'Turmas',
            'href' => base_url().'turmas',
            'icon' => 'fa-book',
        ),
        'modalidades' => array(
            'label' => 'Modalidades',
            'href' => base_url().'modalidades',
            'icon' => 'fa-tags',
        ),
        'financeiro' => array(
            'label' => 'Financeiro',
            'href' => base_url().'financeiro',
            'icon' => 'fa-money',
            'submenu' => array(
                'painel' => array(
                    'label' => 'Painel',
                    'href' => base_url().'financeiro',
                ),
                'contratos' => array(
                    'label' => 'Contratos',
                    'href' => base_url().'contratos',
                ),
                'lancamentos' => array(
                    'label' => 'Lançamentos',
                    'href' => base_url().'financeiro/lancamentos',
                ),
            ),
        ),
        'relatorios' => array(
            'label' => 'Relatórios',
            'href' => base_url().'relatorios',
            'icon' => 'fa-list-alt',
            'submenu' => array(
                'painel' => array(
                    'label' => 'Painel',
                    'href' => base_url().'relatorios',
                ),
                'alunos' => array(
                    'label' => 'Alunos',
                    'href' => base_url().'relatorios/alunos',
                ),
                'turmas' => array(
                    'label' => 'Turmas',
                    'href' => base_url().'relatorios/turmas',
                ),
                'modalidade' => array(
                    'label' => 'Modalidade',
                    'href' => base_url().'relatorios/modalidade',
                ),
                'financeiro' => array(
                    'label' => 'Financeiro',
                    'href' => base_url().'relatorios/financeiro',
                ),
            ),
        ),
    ),
);