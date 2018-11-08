<?php
    session_start();
    include_once("models/PropriedadeModel.php");
    include_once("dao/PropriedadeDAO.php");

    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $id_prop = $_GET["id_prop"]; 
    $id_dono = $_SESSION["id"];

    $dao = new PropriedadeDAO();

    $resutadoDelete = $dao->apagar_prop($id_dono, $id_prop);

    if($resutadoDelete){
      $mensagem = "<script>alert('Propriedade removida com sucesso');</script>";
      $_SESSION['msgCadastro'] = $mensagem;

      header("Location: propriedade.php");
    }else{
      $mensagem = "<script>alert('Erro ao remover propriedade: $nome_propriedade');</script>";
      $_SESSION['msgCadastro'] = $mensagem;
      
      header("Location: propriedade.php");
    }

?>