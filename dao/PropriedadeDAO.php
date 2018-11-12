<?php

class PropriedadeDAO {
    
    public function cadastraProp($p){
        include_once('../conexao.php');
        include_once('../models/PropriedadeModel.php');

        $id_dono = $p->getId_dono();
        $nome_propriedade = $p->getNome();
        $data = $p->getData();
        $valor = $p->getValor();
        $tamanho = $p->getTamanho();
        $percuso_manobra = $p->getPercuso_manobra();
        $solo = $p->getSolo();
        $declividade = $p->getDeclividade();
        $fertilidade = $p->getFertilidade();
        $relevo = $p->getRelevo();
        
        $query = "INSERT INTO propriedade (id_dono, nome_propriedade, 
            data, valor, tamanho, percuso_manobra, solo, declividade, fertilidade, relevo) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "issdiissss", $id_dono, $nome_propriedade, $data, $valor, $tamanho, 
            $percuso_manobra, $solo, $declividade, $fertilidade, $relevo);
            
        $dados = mysqli_stmt_execute($stmt) or die("Erro: ". $conn->error);
        return $dados;
    }

    public function editar_prop($p){
        include_once('../conexao.php');
        include_once('../models/PropriedadeModel.php');

        $id_dono = $p->getId_dono();
        $id_prop = $p->getId_propriedade();
        $nome_propriedade = $p->getNome();
        $data = $p->getData();
        $valor = $p->getValor();
        $tamanho = $p->getTamanho();
        $percuso_manobra = $p->getPercuso_manobra();
        $solo = $p->getSolo();
        $declividade = $p->getDeclividade();
        $fertilidade = $p->getFertilidade();
        $relevo = $p->getRelevo();
        
        $query = "UPDATE propriedade SET nome_propriedade = ?, data = ?, valor = ?, tamanho = ?, 
            percuso_manobra = ?, solo = ?, declividade = ?, fertilidade =?, relevo = ? 
            WHERE id_propriedade = ? AND id_dono = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssdiissssii", $nome_propriedade, $data, $valor, $tamanho, 
            $percuso_manobra, $solo, $declividade, $fertilidade, $relevo, $id_prop, $id_dono);
        
        $status = mysqli_stmt_execute($stmt) or die("Erro: ". $conn->error);
        return $status;
    }

    public function apagar_prop($id_dono, $id_prop){
        include_once('../conexao.php');
        include_once('../models/PropriedadeModel.php');
        
        $query = "DELETE FROM propriedade WHERE id_propriedade = ? AND id_dono = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ii", $id_prop, $id_dono);
        
        $status = mysqli_stmt_execute($stmt) or die("Erro: ". $conn->error);
        return $status;
    }

    public function pesquisar($id_dono){
        include_once('./conexao.php');
        include_once('./models/PropriedadeModel.php');
        // Fazendo a seleção dos dados no BD
        $query = "SELECT * FROM propriedade WHERE id_dono = $id_dono";
        $dados = mysqli_query($conn, $query);
        $total = mysqli_num_rows($dados);
        if ($total){
            $propriedades = array();
            while ($p = mysqli_fetch_assoc($dados)){
                $id = $p["id_propriedade"];
                $id_dono = $p["id_dono"];
                $nome_propriedade = $p["nome_propriedade"];
                $data = $p["data"];
                $valor = $p["valor"];
                $tamanho = $p["tamanho"];
                $percuso_manobra = $p["percuso_manobra"];
                $solo = $p["solo"];
                $declividade = $p["declividade"];
                $fertilidade = $p["fertilidade"];
                $relevo = $p["relevo"];

                $p = new Propriedade($id_dono, $id, $nome_propriedade, $data, $valor,
                $percuso_manobra, $solo, $relevo, $fertilidade, $tamanho, $declividade);
                // Inserindo propriedade p no array de propriedades
                array_push($propriedades, $p);
            }
            return $propriedades;
        }
    }
}