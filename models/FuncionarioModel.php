<?php

class Funcionario {
    private $idUsuario, $idFuncionario, $nome, $dataAdmissao, $dataNascimento,
    $fgts, $insalubridade, $periculosidade, $inss, $experiencia, $agua,
    $luz, $aluguel, $encargos, $funcao;

    // Contrutor
    public function __construct($idUsuario, $idFuncionario, $nome, $dataAdmissao, $dataNascimento,
    $fgts, $insalubridade, $periculosidade, $inss, $experiencia, $agua,
    $luz, $aluguel, $encargos, $funcao){
        $this->idUsuario = $idUsuario;
        $this->idFuncionario = $idFuncionario;
        $this->nome = $nome;
        $this->dataAdmissao = $dataAdmissao;
        $this->dataNascimento = $dataNascimento;
        $this->fgts = $fgts;
        $this->insalubridade = $insalubridade;
        $this->periculosidade = $periculosidade;
        $this->inss = $inss;
        $this->experiencia = $experiencia;
        $this->agua = $agua;
        $this->luz = $luz;
        $this->aluguel = $aluguel;
        $this->encargos = $encargos;
        $this->funcao = $funcao;
    }

    // Métodos Getters e Setters
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDataAdmissao()
    {
        return $this->dataAdmissao;
    }

    public function setDataAdmissao($dataAdmissao)
    {
        $this->dataAdmissao = $dataAdmissao;

        return $this;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    public function getFgts()
    {
        return $this->fgts;
    }

    public function setFgts($fgts)
    {
        $this->fgts = $fgts;

        return $this;
    }

    public function getInsalubridade()
    {
        return $this->insalubridade;
    }

    public function setInsalubridade($insalubridade)
    {
        $this->insalubridade = $insalubridade;

        return $this;
    }

    public function getPericulosidade()
    {
        return $this->periculosidade;
    }

    public function setPericulosidade($periculosidade)
    {
        $this->periculosidade = $periculosidade;

        return $this;
    }

    public function getInss()
    {
        return $this->inss;
    }

    public function setInss($inss)
    {
        $this->inss = $inss;

        return $this;
    }

    public function getExperiencia()
    {
        return $this->experiencia;
    }

    public function setExperiencia($experiencia)
    {
        $this->experiencia = $experiencia;

        return $this;
    }

    public function getAgua()
    {
        return $this->agua;
    }

    public function setAgua($agua)
    {
        $this->agua = $agua;

        return $this;
    }

    public function getLuz()
    {
        return $this->luz;
    }

    public function setLuz($luz)
    {
        $this->luz = $luz;

        return $this;
    }

    public function getEncargos()
    {
        return $this->encargos;
    }

    public function setEncargos($encargos)
    {
        $this->encargos = $encargos;

        return $this;
    }

    public function getFuncao()
    {
        return $this->funcao;
    }

    public function setFuncao($funcao)
    {
        $this->funcao = $funcao;

        return $this;
    }
 
    public function getAluguel()
    {
        return $this->aluguel;
    }

    public function setAluguel($aluguel)
    {
        $this->aluguel = $aluguel;

        return $this;
    }
}