<?php
    session_start();
    include_once("models/PropriedadeModel.php");
    include_once("dao/PropriedadeDAO.php");

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

      header("Location: propriedade.php");
    }else{
      $mensagem = "<script>alert('Erro ao cadastrar propriedade');</script>";
      $_SESSION['msgCadastro'] = $mensagem;
      
      header("Location: propriedade.php");
    }

?>