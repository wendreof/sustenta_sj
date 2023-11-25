<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    
    class IndexController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        public function index(){       
            $title = "Teste de Página";
            
            $this->getView()->title = $title;
            $this->render('index', 'dashboard');
        }

        public function cadastro(){ 
            $title = "Página de Cadastro";
            
            $this->getView()->title = $title;            
            $this->render('cadastro', 'dashboard');
        }
          
	    public function validaAutenticacao() {

        }
    }
    
?>
