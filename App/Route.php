<?php    
    namespace App;
    
    use FW\Init\Boostrap;
    
    class Route extends Boostrap{
     
        public function initRoutes(){
            
            
            //Exemplo de Rota    
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'IndexController',
                'action' => 'index'
            );
            
            $routes['cadastro'] = array(
                'route' => '/cadastro',
                'controller' => 'IndexController',
                'action' => 'cadastro'
            );

            $routes['cadastro_envio'] = array(
                'route' => '/cadastroenvio',
                'controller' => 'CadastroController',
                'action' => 'cadastro'
            );

            $routes['cadastro_listar'] = array(
                'route' => '/listar',
                'controller' => 'CadastroController',
                'action' => 'listar'
            );

            $routes['cadastro_editar'] = array(
                'route' => '/editar',
                'controller' => 'CadastroController',
                'action' => 'formedicao'
            );

            $routes['cadastro_edicao'] = array(
                'route' => '/cadastroeditar',
                'controller' => 'CadastroController',
                'action' => 'editar'
            );
            
            $routes['cadastro_excluir'] = array(
                'route' => '/excluir',
                'controller' => 'CadastroController',
                'action' => 'excluir'
            );
            
            //Não excluir a Rota abaixo
            $routes['error-404'] = array(
                'route' => '/error404',
                'controller' => 'ErrorController',
                'action' => 'error404'
            );
                                  
            $this->setRoutes($routes);
            
        }

    }
    
?>