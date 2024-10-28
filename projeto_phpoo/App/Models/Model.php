<?php

namespace App\Models;

use App\Models\Database\TypeDatabase\TypePdoDatabase;
use App\Models\Database\TypeDatabase\TypeMysqliDatabase;
use App\Models\Database\TypeDatabase\TypeDatabase;

class Model{

    public $typeDatabase;
    protected $table;
    public function __construct(){
        $database = new TypeDatabase(new TypePDODatabase);
        $this->typeDatabase = $database->getDatabase();
    }

    public function fetchAll(){
        $sql = "select * from{$this->table}";
        $this->typeDatabase->prepare($sql);
        $this->typeDatabase->execute();
        return $this->typeDatabase->fetchAll();
    }


    public function find($field,$value,$fetch=null){
        $sql = "select * from {$this->table} where $field = ?";
        $this->typeDatabase->prepare($sql);
        $this->typeDatabase->bindValue(1,$value);
        $this->typeDatabase->execute();
        return ($fetch == null) ? $this->typeDatabase->fetch() : $this->typeDatabase->fetchAll();
    }

}