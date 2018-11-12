<?php
    session_start();
    include_once("../models/FuncionarioModel.php");
    include_once("../dao/FuncionarioDAO.php");

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

    $dao = new FuncionarioDAO();

    $resultadoCadastro = $dao->cadastraFunc($p);

    if($resultadoCadastro){
      $mensagem = "<script>alert('Funcionario cadastrado com sucesso');</script>";
      $_SESSION['msgCadastro'] = $mensagem;

      header("Location: funcionario.php");
    }else{
      $mensagem = "<script>alert('Erro ao cadastrar funcionario');</script>";
      $_SESSION['msgCadastro'] = $mensagem;
      
      header("Location: funcionario.php");
    }

?>