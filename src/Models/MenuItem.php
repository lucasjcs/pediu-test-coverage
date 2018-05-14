<?php

namespace Mike\Models;

class MenuItem implements \JsonSerializable {

    private $title;
    private $description;
    private $valor;
    private $category;

    public function __construct($title, $description, $valor, $category)
    {
        $this->title = $title;
        $this->description = $description;
        $this->valor = $valor;
        $this->category = $category;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }


    public function getValor()
    {
        return $this->valor;
    }

    public function getCategory()
    {
        return $this->category;
    }


    public function jsonSerialize()
    {
        return [
            'title'=>$this->getTitle(),
            'description'=>$this->getDescription(),
            'valor'=>$this->getValor(),
            'category'=>$this->getCategory()
        ];
    }
}