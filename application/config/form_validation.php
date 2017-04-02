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
                );
			   