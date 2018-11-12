<?php
    session_start();
    include_once("models/PropriedadeModel.php");
    include_once("dao/PropriedadeDAO.php");

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

      header("Location: propriedade.php");
    }else{
      $mensagem = "<script>$('#modalMsg').modal('show')</script>";
      $mensagem = "<script>alert('Erro ao atualizar propriedade: $nome_propriedade');</script>";
      $_SESSION['msgCadastro'] = $mensagem;
      
      header("Location: propriedade.php");
    }

?>