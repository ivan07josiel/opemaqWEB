<?php

class Propriedade {
    private $id_dono, $id_propriedade, $nome, $data, $valor,
    $percuso_manobra, $solo, $relevo, $fertilidade, $tamanho, $declividade; 

    // Contrutor
    public function __construct($id_dono, $id_propriedade, $nome, $data, $valor,
    $percuso_manobra, $solo, $relevo, $fertilidade, $tamanho, $declividade){
        $this->id_dono = $id_dono;
        $this->id_propriedade = $id_propriedade;
        $this->nome = $nome;
        $this->data = $data;
        $this->valor = $valor;
        $this->percuso_manobra = $percuso_manobra;
        $this->solo = $solo;
        $this->relevo = $relevo;
        $this->fertilidade = $fertilidade;
        $this->tamanho = $tamanho;
        $this->declividade = $declividade;
    }

    // Métodos Getters e Setters
    public function getId_dono()
    {
        return $this->id_dono;
    }

  
    public function setId_dono($id_dono)
    {
        $this->id_dono = $id_dono;

        return $this;
    }

  
    public function getId_propriedade()
    {
        return $this->id_propriedade;
    }

  
    public function setId_propriedade($id_propriedade)
    {
        $this->id_propriedade = $id_propriedade;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

    }


    public function getData()
    {
        return $this->data;
    }

 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    public function getPercuso_manobra()
    {
        return $this->percuso_manobra;
    }

    public function setPercuso_manobra($percuso_manobra)
    {
        $this->percuso_manobra = $percuso_manobra;

        return $this;
    }
 
    public function getSolo()
    {
        return $this->solo;
    }

    public function setSolo($solo)
    {
        $this->solo = $solo;

        return $this;
    }

    public function getRelevo()
    {
        return $this->relevo;
    }

    public function setRelevo($relevo)
    {
        $this->relevo = $relevo;

        return $this;
    }

    public function getFertilidade()
    {
        return $this->fertilidade;
    }

    public function setFertilidade($fertilidade)
    {
        $this->fertilidade = $fertilidade;

        return $this;
    }

    public function getTamanho()
    {
        return $this->tamanho;
    }
 
    public function setTamanho($tamanho)
    {
        $this->tamanho = $tamanho;

        return $this;
    }

    public function getDeclividade()
    {
        return $this->declividade;
    }
 
    public function setDeclividade($declividade)
    {
        $this->declividade = $declividade;

        return $this;
    }
}