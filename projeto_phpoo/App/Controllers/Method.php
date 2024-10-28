<?php
namespace App\Controllers;

use App\Classes\Uri;

class Method{

    private $uri;

    public Function __construct(){
        $this->uri = new Uri;
    }

    private function getMethod(){
        if(!$this->uri->emptyUri()){
            $explodeUri = array_filter(explode('/',$this->uri->getUri()));
            return (isset($explodeUri[2])) ?: $explodeUri[2];
        }
    }

    public function method($object){
        dump($this->getMethod());
        if(method_exists($object, $this->getMethod())){
            return $this->getMethod();
        }
        return DEFAULT_METHOD;
    }

}