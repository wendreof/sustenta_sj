<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    use App\Model\CadastroModel;
    use App\DAO\CadastroDAO;
    
    class CadastroController extends Action{

       public function cadastro(){

            $cadastro = new CadastroModel();
            $cadastroDAO = new CadastroDAO();
            
            $cadastro->__set("DEN_TITULO", $_POST["DEN_TITULO"]);
            $cadastro->__set("DEN_DESCRICAO", $_POST["DEN_DESCRICAO"]);
            $cadastro->__set("DEN_FOTO_VIDEO", $_POST["DEN_FOTO_VIDEO"]);
            $cadastro->__set("DEN_RUA", $_POST["DEN_RUA"]);
            $cadastro->__set("DEN_NUMERO", $_POST["DEN_NUMERO"]);
            $cadastro->__set("DEN_BAIRRO", $_POST["DEN_BAIRRO"]);
            $cadastro->__set("DEN_COMPLEMENTO", $_POST["DEN_COMPLEMENTO"]);        
        
            $cadastroDAO->inserir($cadastro);
          
       }

       public function excluir(){

          
          $cadastroDAO = new CadastroDAO();
          
          $cadastroDAO->excluir($_GET["id"]);
               
          
          

     }

       public function editar(){

          $cadastro = new CadastroModel();
          $cadastroDAO = new CadastroDAO();
          $cadastro->__set("DEN_ID", $_POST["DEN_ID"]);
          $cadastro->__set("DEN_TITULO", $_POST["DEN_TITULO"]);
          $cadastro->__set("DEN_DESCRICAO", $_POST["DEN_DESCRICAO"]);
          $cadastro->__set("DEN_FOTO_VIDEO", $_POST["DEN_FOTO_VIDEO"]);
          $cadastro->__set("DEN_RUA", $_POST["DEN_RUA"]);
          $cadastro->__set("DEN_NUMERO", $_POST["DEN_NUMERO"]);
          $cadastro->__set("DEN_BAIRRO", $_POST["DEN_BAIRRO"]);
          $cadastro->__set("DEN_COMPLEMENTO", $_POST["DEN_COMPLEMENTO"]);
          
          $cadastroDAO->alterar($cadastro);
          

          }

       public function listar(){

            $cadastroDAO = new CadastroDAO();
            $cadastros = $cadastroDAO->listar();
            $this->getView()->cadastros = $cadastros;
            $this->render('listar', 'dashboard');
       }

       public function formedicao(){
          $title = "Edição de Cadastros";
          $this->getView()->title = $title;  

          if(isset($_GET['id'])){
               $cadastro = new CadastroModel();
               $cadastroDAO = new CadastroDAO();

               $result = $cadastroDAO->buscarPorId($_GET['id']);
               $this->getView()->result = $result;
          }else{
               $this->getView()->result = '';
          }

          $this->render('editar', 'dashboard');
     }

       public function validaAutenticacao() {

       }
        




    }
?>