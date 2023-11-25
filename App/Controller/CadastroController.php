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
        
            $cadastroDAO->inserir($cadastro);
          
       }

       public function excluir(){

          
          $cadastroDAO = new CadastroDAO();
          
          $cadastroDAO->excluir($_GET["id"]);
               
          
          

     }

       public function editar(){

          $cadastro = new CadastroModel();
          $cadastroDAO = new CadastroDAO();
          $cadastro->__set("id", $_POST["id"]);
          $cadastro->__set("nome", $_POST["nome"]);
          $cadastro->__set("email", $_POST["email"]);
          $cadastro->__set("telefone", $_POST["telefone"]);
          $cadastro->__set("assunto", $_POST["assunto"]);
          $cadastro->__set("mensagem", $_POST["mensagem"]);
          
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