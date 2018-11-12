<?php
    // Forca o php mostrar os erros
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

    session_start();
    include_once("../models/PropriedadeModel.php");
    include_once("../dao/PropriedadeDAO.php");

    $action = $_GET["action"];

    switch ($action) {
        case 'cadastrar':
            $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            $id = 0; // Nao utilizara o id pois ele é auto incrementado no BD 
            $id_dono = $_SESSION["id"];
            $nome_propriedade = $dados["nomeProp"];
            $data = $dados["data"];
            $valor = $dados["valorReais"];
            $tamanho = $dados["tamProp"];
            $percuso_manobra = $dados["percursoManobra"];
            $solo = $dados["solo"];
            $declividade = $dados["declividade"];
            $fertilidade = $dados["fertilidade"];
            $relevo = $dados["relevo"];
        
            $p = new Propriedade($id_dono, $id, $nome_propriedade, $data, $valor,
            $percuso_manobra, $solo, $relevo, $fertilidade, $tamanho, $declividade);
        
            $dao = new PropriedadeDAO();
        
            $resultadoCadastro = $dao->cadastraProp($p);
        
            if($resultadoCadastro){
                $mensagem = "<script>alert('Propriedade cadastrada com sucesso');</script>";
                $_SESSION['msgCadastro'] = $mensagem;
            
                header("Location: ../propriedade.php");
            }else{
                $mensagem = "<script>alert('Erro ao cadastrar propriedade');</script>";
                $_SESSION['msgCadastro'] = $mensagem;
                
                header("Location: ../propriedade.php");
            }
            break;
        
        case 'editar':
            $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            $id_prop = $_GET["id_prop"]; 
            $id_dono = $_SESSION["id"];
            $nome_propriedade = $dados["nomeProp"];
            $data = $dados["data"];
            $valor = $dados["valorReais"];
            $tamanho = $dados["tamProp"];
            $percuso_manobra = $dados["percursoManobra"];
            $solo = $dados["solo"];
            $declividade = $dados["declividade"];
            $fertilidade = $dados["fertilidade"];
            $relevo = $dados["relevo"];
        
            $p = new Propriedade($id_dono, $id_prop, $nome_propriedade, $data, $valor,
            $percuso_manobra, $solo, $relevo, $fertilidade, $tamanho, $declividade);
        
            $dao = new PropriedadeDAO();
        
            $resutadoUpdate = $dao->editar_prop($p);
        
            if($resutadoUpdate){
                $mensagem = "<script>alert('Propriedade atualizada com sucesso');</script>";
                $_SESSION['msgCadastro'] = $mensagem;
            
                header("Location: ../propriedade.php");
            }else{
                $mensagem = "<script>$('#modalMsg').modal('show')</script>";
                $mensagem = "<script>alert('Erro ao atualizar propriedade: $nome_propriedade');</script>";
                $_SESSION['msgCadastro'] = $mensagem;
                
                header("Location: ../propriedade.php");
            }
            break;
        case 'remover':
            $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            $id_prop = $_GET["id_prop"]; 
            $id_dono = $_SESSION["id"];
        
            $dao = new PropriedadeDAO();
        
            $resutadoDelete = $dao->apagar_prop($id_dono, $id_prop);
        
            if($resutadoDelete){
                $mensagem = "<script>alert('Propriedade removida com sucesso');</script>";
                $_SESSION['msgCadastro'] = $mensagem;
            
                header("Location: ../propriedade.php");
            }else{
                $mensagem = "<script>alert('Erro ao remover propriedade');</script>";
                $_SESSION['msgCadastro'] = $mensagem;
                
                header("Location: ../propriedade.php");
            }
            break;
        default:
            // TODO implementar caso padrao
            # code...
            break;
    }


?>