<?php

    namespace App\Model;

    class CadastroModel{
      private $DEN_TITULO;
        private $DEN_DESCRICAO;



        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }
    }