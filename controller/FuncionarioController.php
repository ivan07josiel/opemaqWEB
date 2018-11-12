<?php
    // Forca o php mostrar os erros
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

    session_start();
    include_once("../models/FuncionarioModel.php");
    include_once("../dao/FuncionarioDAO.php");
    

    $action = $_GET["action"];
    
    
    switch ($action) {
        case 'cadastrar':
            $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

            $idUsuario = $_SESSION["id"];                
            $idFuncionario = 0; // Nao utilizara o id pois ele é auto incrementado no BD
            $nome = $dados["nome"];
            $dataAdmissao = $dados["dataAdmissao"];
            $dataNascimento = $dados["dataNascimento"];
            $fgts = $dados["fgts"];
            $insalubridade = $dados["insalubridade"];
            $periculosidade = $dados["periculosidade"];
            $inss = $dados["inss"];
            $experiencia = $dados["experiencia"];
            $agua = $dados["agua"];
            $luz = $dados["luz"];
            $aluguel = $dados["aluguel"];
            $encargos = $dados["encargos"];
            $funcao = $dados["funcao"];
            
            
            $f = new Funcionario($idUsuario, $idFuncionario, $nome, $dataAdmissao, $dataNascimento,
                $fgts, $insalubridade, $periculosidade, $inss, $experiencia, $agua,
                $luz, $aluguel, $encargos, $funcao);

            echo $action;
        
            $dao = new FuncionarioDAO();
        
            $resultadoCadastro = $dao->cadastraFunc($f);

        
            if($resultadoCadastro){
                $mensagem = "<script>
                    $('#tituloModalRetorno').text('Cadastro de Funcionário');
                    $('#msgModalRetorno').text('Funcionário cadastrado com sucesso');
                    $('#modalMsgRetorno').modal('show');
                </script>";
                //$mensagem = "<script>alert('Funcionario cadastrado com sucesso');</script>";
                $_SESSION['msgCadastro'] = $mensagem;
            
                header("Location: ../funcionarios.php");
            }else{
                $mensagem = "<script>
                    $('#tituloModalRetorno').text('Cadastro de Funcionário');
                    $('#msgModalRetorno').text('ATENÇÃO: Erro ao tentar cadastrar funcionário!');
                    $('#modalMsgRetorno').modal('show');
                </script>";
                //$mensagem = "<script>alert('Erro ao cadastrar funcionario');</script>";
                $_SESSION['msgCadastro'] = $mensagem;
                
                header("Location: ../funcionarios.php");
            }
            break;
        case 'editar':
            $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            $idFuncionario = $_GET["id_func"]; 
            $idUsuario = $_SESSION["id"];
            $nome = $dados["nome"];
            $dataAdmissao = $dados["dataAdmissao"];
            $dataNascimento = $dados["dataNascimento"];
            $fgts = $dados["fgts"];
            $insalubridade = $dados["insalubridade"];
            $periculosidade = $dados["periculosidade"];
            $inss = $dados["inss"];
            $experiencia = $dados["experiencia"];
            $agua = $dados["agua"];
            $luz = $dados["luz"];
            $aluguel = $dados["aluguel"];
            $encargos = $dados["encargos"];
            $funcao = $dados["funcao"];

            $f = new Funcionario($idUsuario, $idFuncionario, $nome, $dataAdmissao, $dataNascimento,
            $fgts, $insalubridade, $periculosidade, $inss, $experiencia, $agua,
            $luz, $aluguel, $encargos, $funcao);
        
            $dao = new FuncionarioDAO();

            $resultadoUpdate = $dao->editarFunc($f);
            
            if($resultadoUpdate){
                $mensagem = "<script>
                    $('#tituloModalRetorno').text('Atualização de Funcionário');
                    $('#msgModalRetorno').text('Funcionário atualizado com sucesso');
                    $('#modalMsgRetorno').modal('show');
                </script>";
                //$mensagem = "<script>alert('Funcionário atualizado com sucesso');</script>";
                $_SESSION['msgCadastro'] = $mensagem;

                header("Location: ../funcionarios.php");
            }else{
                $mensagem = "<script>
                    $('#tituloModalRetorno').text('Atualização de Funcionário');
                    $('#msgModalRetorno').text('Erro ao atualizar funcionário: $nome');
                    $('#modalMsgRetorno').modal('show');
                </script>";
                //$mensagem = "<script>alert('Erro ao atualizar funcionário: $nome');</script>";
                $_SESSION['msgCadastro'] = $mensagem;
                
                header("Location: ../funcionarios.php");
            }
            break;
        case 'remover':
            $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            $idFuncionario = $_GET["id_func"]; 
            $idUsuario = $_SESSION["id"];
        
            $dao = new FuncionarioDAO();
        
            $resutadoDelete = $dao->apagar_func($idUsuario, $idFuncionario);
        
            if($resutadoDelete){
                $mensagem = "<script>
                    $('#tituloModalRetorno').text('Remoção de Funcionário');
                    $('#msgModalRetorno').text('Funcionário removido com sucesso');
                    $('#modalMsgRetorno').modal('show');
                </script>";
                //$mensagem = "<script>alert('Funcionario removido com sucesso');</script>";
            $_SESSION['msgCadastro'] = $mensagem;
        
            header("Location: ../funcionarios.php");
            }else{
                $mensagem = "<script>
                    $('#tituloModalRetorno').text('Remoção de Funcionário');
                    $('#msgModalRetorno').text('Erro ao remover funcionário');
                    $('#modalMsgRetorno').modal('show');
                </script>";
            //$mensagem = "<script>alert('Erro ao remover funcionario');</script>";
            $_SESSION['msgCadastro'] = $mensagem;
            
            header("Location: ../funcionarios.php");
            }
            break;
        default:
            // TODO implementar caso padrao
            # code...
            break;
    }