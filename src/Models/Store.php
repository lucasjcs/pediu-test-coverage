<?php

namespace Mike\Models;

class Store implements \JsonSerializable {

    private $name;
    private $logo;
    private $phone;
    private $type;

    private $menu = array();

    public function __construct($name, $logo, $phone, $type, array $menu = array())
    {
        $this->name = $name;
        $this->logo = $logo;
        $this->phone = $phone;
        $this->type = $type;
        $this->menu = $menu;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getLogo()
    {
        return $this->logo;
    }


    public function getPhone()
    {
        return $this->phone;
    }


    public function getType()
    {
        return $this->type;
    }


    public function getMenu()
    {
        return $this->menu;
    }

    public function setMenu(array $menu){
        $this->menu = $menu;
    }


    public function jsonSerialize()
    {
       return [
           'name'=>$this->getName(),
           'logo'=>$this->getLogo(),
           'phone'=>$this->getPhone(),
           'type'=>$this->getType(),
           'menu'=>$this->getMenu()
       ];
    }
}