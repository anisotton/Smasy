<?php
$config = array(
                'alunoMaior' =>
                        array(
                            array(
                                'field'=>'nome',
                                'label'=>'Nome',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'dtnascimento',
                                'label'=>'Data Nascimento',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'cpf',
                                'label'=>'CPF',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'sexo',
                                'label'=>'Sexo',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'naturalidade',
                                'label'=>'Naturalidade',
                                'rules'=>'required|trim'
                            ),
                        ),
                'contrato' =>
                    array(
                        array(
                            'field'=>'nome',
                            'label'=>'Nome',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'tipo',
                            'label'=>'Tipo',
                            'rules'=>'required|trim'
                        ),
                    ),
                'alunoMenor' =>
                        array(
                            array(
                                'field'=>'nome',
                                'label'=>'Nome',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'dtnascimento',
                                'label'=>'Data Nascimento',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'sexo',
                                'label'=>'Sexo',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'naturalidade',
                                'label'=>'Naturalidade',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'id_responsavel',
                                'label'=>'Responsavel',
                                'rules'=>'required|trim'
                            ),
                        ),
                'pessoa' =>
                        array(
                            array(
                                'field'=>'nome',
                                'label'=>'Nome',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'dtnascimento',
                                'label'=>'Data Nascimento',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'sexo',
                                'label'=>'Sexo',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'cpf',
                                'label'=>'CPF',
                                'rules'=>'required|trim'
                            ),
                            array(
                                'field'=>'naturalidade',
                                'label'=>'Naturalidade',
                                'rules'=>'required|trim'
                            ),
                        ),
                'professor' =>
                    array(
                        array(
                            'field'=>'nome',
                            'label'=>'Nome',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'dtnascimento',
                            'label'=>'Data Nascimento',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'cpf',
                            'label'=>'CPF',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'sexo',
                            'label'=>'Sexo',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'naturalidade',
                            'label'=>'Naturalidade',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'contrato',
                            'label'=>'Contrato',
                            'rules'=>'required|trim'
                        ),
                    ),
                'modalidade' =>
                    array(
                        array(
                            'field'=>'nome',
                            'label'=>'Nome',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'valor',
                            'label'=>'Valor',
                            'rules'=>'required|trim'
                        ),
                    ),
                'horario' =>
                    array(
                        array(
                            'field'=>'nome',
                            'label'=>'Nome',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'horaini',
                            'label'=>'Hora inicial',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'horafim',
                            'label'=>'Hora final',
                            'rules'=>'required|trim'
                        ),
                    ),
                'faixaetaria' =>
                    array(
                        array(
                            'field'=>'nome',
                            'label'=>'Nome',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'idadeini',
                            'label'=>'Idade inicial',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'idadefim',
                            'label'=>'Idade final',
                            'rules'=>'required|trim'
                        ),
                    ),
                'sala' =>
                    array(
                        array(
                            'field'=>'nome',
                            'label'=>'Nome',
                            'rules'=>'required|trim'
                        ),
                        array(
                            'field'=>'capacidade',
                            'label'=>'Capacidade',
                            'rules'=>'required|trim'
                        ),
                    ),
                );
			   