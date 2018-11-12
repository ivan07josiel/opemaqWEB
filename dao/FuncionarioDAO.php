<?php

class FuncionarioDAO {
    
    public function cadastraFunc($f){
        include_once('../conexao.php');
        include_once('../models/FuncionarioModel.php');

        $idUsuario = $f->getIdUsuario();
        $idFuncionario = $f->getIdFuncionario();
        $nome = $f->getNome();
        $dataAdmissao = $f->getDataAdmissao();
        $dataNascimento = $f->getDataNascimento();
        $fgts = $f->getFgts();
        $insalubridade = $f->getInsalubridade();
        $periculosidade = $f->getPericulosidade();
        $inss = $f->getInss();
        $experiencia = $f->getExperiencia();
        $agua = $f->getAgua();
        $luz = $f->getLuz();
        $aluguel = $f->getAluguel();
        $encargos = $f->getEncargos();
        $funcao = $f->getFuncao();

        $query = "INSERT INTO funcionario (id_usuario, nome, data_admissao, data_nascimento, fgts, insalubridade, 
            periculosidade, inss, experiencia, agua, luz, aluguel, encargos, funcao) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "isssddddsddddi", $idUsuario, $nome, $dataAdmissao, $dataNascimento, $fgts, 
            $insalubridade, $periculosidade, $inss, $experiencia, $agua, $luz, $aluguel, $encargos, $funcao);
            
        $status = mysqli_stmt_execute($stmt) or die("Erro: ". $conn->error);
        return $status;
    }

    public function editarFunc($f){
        include_once('../conexao.php');
        include_once('../models/FuncionarioModel.php');


        $idUsuario = $f->getIdUsuario();
        $idFuncionario = $f->getIdFuncionario();
        $nome = $f->getNome();
        $dataAdmissao = $f->getDataAdmissao();
        $dataNascimento = $f->getDataNascimento();
        $fgts = $f->getFgts();
        $insalubridade = $f->getInsalubridade();
        $periculosidade = $f->getPericulosidade();
        $inss = $f->getInss();
        $experiencia = $f->getExperiencia();
        $agua = $f->getAgua();
        $luz = $f->getLuz();
        $aluguel = $f->getAluguel();
        $encargos = $f->getEncargos();
        $funcao = $f->getFuncao();
        

        $query = "UPDATE funcionario SET nome = ?, data_admissao = ?, data_nascimento = ?, fgts = ?, insalubridade = ?, 
            periculosidade = ?, inss = ?, experiencia = ?, agua = ?, luz = ?, aluguel = ?, encargos = ?, funcao = ? 
            WHERE id = ? AND id_usuario = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssddddsddddiii", $nome, $dataAdmissao, $dataNascimento, $fgts, 
            $insalubridade, $periculosidade, $inss, $experiencia, $agua, $luz, $aluguel, 
            $encargos, $funcao, $idFuncionario, $idUsuario);
        
        $status = mysqli_stmt_execute($stmt) or die("Erro: ". $conn->error);
        return $status;
    }

    public function apagar_func($id_user, $id_func){
        include_once('../conexao.php');
        include_once('../models/FuncionarioModel.php');
        
        $query = "DELETE FROM funcionario WHERE id = ? AND id_usuario = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ii", $id_func, $id_user);
        
        $status = mysqli_stmt_execute($stmt) or die("Erro: ". $conn->error);
        return $status;
    }

    public function pesquisar($id_user){
        include_once('./conexao.php');
        include_once('./models/FuncionarioModel.php');
        // Fazendo a seleção dos dados no BD
        $query = "SELECT * FROM funcionario WHERE id_usuario = $id_user";
        $dados = mysqli_query($conn, $query)  or die("Erro FuncionarioDAO.pesquisar(): ". $conn->error);
        $total = mysqli_num_rows($dados);
        if ($total){
            $funcionarios = array();
            while ($f = mysqli_fetch_assoc($dados)){
                $idUsuario = $f["id_usuario"];                
                $idFuncionario = $f["id"];
                $nome = $f["nome"];
                $dataAdmissao = $f["data_admissao"];
                $dataNascimento = $f["data_nascimento"];
                $fgts = $f["fgts"];
                $insalubridade = $f["insalubridade"];
                $periculosidade = $f["periculosidade"];
                $inss = $f["inss"];
                $experiencia = $f["experiencia"];
                $agua = $f["agua"];
                $luz = $f["luz"];
                $aluguel = $f["aluguel"];
                $encargos = $f["encargos"];
                $funcao = $f["funcao"];

                // Instanciando um funcionario
                $f = new Funcionario($idUsuario, $idFuncionario, $nome, $dataAdmissao, $dataNascimento,
                    $fgts, $insalubridade, $periculosidade, $inss, $experiencia, $agua,
                    $luz, $aluguel, $encargos, $funcao);
                
                
                // Inserindo propriedade p no array de funcionarios
                array_push($funcionarios, $f);
            }
            return $funcionarios;
        }
    }
}