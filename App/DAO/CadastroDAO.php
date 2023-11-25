<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\CadastroModel;

        class CadastroDAO extends DAO{

            public function inserir($obj){
                try{
                    $sql = "insert into denuncias (
                                DEN_TITULO,
                                DEN_DESCRICAO,
                                DEN_FOTO_VIDEO,
                                DEN_RUA,
                                DEN_NUMERO,
                                DEN_BAIRRO,
                                DEN_COMPLEMENTO,
                                DEN_STATUS_DENUNCIA,
                                DEN_DATA_PUBLICACAO
                            ) values(
                                :DEN_TITULO,
                                :DEN_DESCRICAO,
                                :DEN_FOTO_VIDEO,
                                :DEN_RUA,
                                :DEN_NUMERO,
                                :DEN_BAIRRO,
                                :DEN_COMPLEMENTO,
                                null,
                                CURDATE() 

                            )";
                        $stmt = $this->getConn()->prepare($sql);

                        $DEN_TITULO = $obj->__get('DEN_TITULO');
                        $DEN_DESCRICAO= $obj->__get('DEN_DESCRICAO');
                        $DEN_FOTO_VIDEO= $obj->__get('DEN_FOTO_VIDEO');
                        $DEN_RUA= $obj->__get('DEN_RUA');
                        $DEN_NUMERO= $obj->__get('DEN_NUMERO');
                        $DEN_BAIRRO= $obj->__get('DEN_BAIRRO');
                        $DEN_COMPLEMENTO= $obj->__get('DEN_COMPLEMENTO');

                        $stmt->bindParam(':DEN_TITULO',$DEN_TITULO);
                        $stmt->bindParam(':DEN_DESCRICAO',$DEN_DESCRICAO);
                        $stmt->bindParam(':DEN_FOTO_VIDEO',$DEN_FOTO_VIDEO);
                        $stmt->bindParam(':DEN_RUA',$DEN_RUA);
                        $stmt->bindParam(':DEN_NUMERO',$DEN_NUMERO); 
                        $stmt->bindParam(':DEN_BAIRRO',$DEN_BAIRRO);
                        $stmt->bindParam(':DEN_COMPLEMENTO',$DEN_COMPLEMENTO);
                        $stmt->execute();

                        header('Location: /listar');          
                }catch (\PDOException $ex){
                    header('Location: /error100');
                    die();
                }

            }
            public function excluir($id){
                try{
                    $sql = "DELETE FROM denuncias WHERE DEN_ID=:id";
                    $stmt = $this->getConn()->prepare($sql);

                    $stmt->bindParam(":id",$id);
                    $stmt->execute();
                    header('Location: /listar');
                }catch(\PDOException $ex){
                    header('Location: /error502');
                    die();
                }
            }
            public function alterar($var){
                try{
                    $sql = "UPDATE denuncias
                            SET
                            DEN_TITULO=:DEN_TITULO,
                            DEN_DESCRICAO=:DEN_DESCRICAO,
                            DEN_FOTO_VIDEO=:DEN_FOTO_VIDEO,
                            DEN_RUA=:DEN_RUA,
                            DEN_NUMERO=:DEN_NUMERO,
                            DEN_BAIRRO=:DEN_BAIRRO,
                            DEN_COMPLEMENTO=:DEN_COMPLEMENTO
                            WHERE
                            DEN_ID=:id";

                            $stmt = $this->getConn()->prepare($sql);
                            $DEN_ID = $var->__get('DEN_ID');
                            $DEN_TITULO = $var->__get('DEN_TITULO');
                            $DEN_DESCRICAO = $var->__get('DEN_DESCRICAO');
                            $DEN_FOTO_VIDEO = $var->__get('DEN_FOTO_VIDEO');
                            $DEN_RUA = $var->__get('DEN_RUA');
                            $DEN_NUMERO = $var->__get('DEN_NUMERO');
                            $DEN_BAIRRO = $var->__get('DEN_BAIRRO');
                            $DEN_COMPLEMENTO = $var->__get('DEN_COMPLEMENTO');


                            $stmt->bindParam(':id', $DEN_ID);
                            $stmt->bindParam(':DEN_TITULO', $DEN_TITULO);
                            $stmt->bindParam(':DEN_DESCRICAO', $DEN_DESCRICAO);
                            $stmt->bindParam(':DEN_FOTO_VIDEO', $DEN_FOTO_VIDEO);
                            $stmt->bindParam(':DEN_RUA', $DEN_RUA);
                            $stmt->bindParam(':DEN_NUMERO', $DEN_NUMERO);
                            $stmt->bindParam(':DEN_BAIRRO', $DEN_BAIRRO);
                            $stmt->bindParam(':DEN_COMPLEMENTO', $DEN_COMPLEMENTO);

                            $stmt->execute();

                            header('Location: /listar');

                } catch(\PDOException $ex){
                    header('Location: /error101');
                    die();
                }
            }

            public function buscarPorId($id){
                try{
                    $cadastros = array();
                    $sql = "SELECT * FROM denuncias WHERE DEN_ID=:id";

                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->bindParam(":id",$id);
                    $stmt->execute();

                    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if($result > 0){

                        $cadastro = new CadastroModel();
                        $cadastro->__set('DEN_ID',$result['DEN_ID']);
                        $cadastro->__set('DEN_TITULO',$result['DEN_TITULO']);
                        $cadastro->__set('DEN_DESCRICAO',$result['DEN_DESCRICAO']);
                        $cadastro->__set('DEN_FOTO_VIDEO',$result['DEN_FOTO_VIDEO']);
                        $cadastro->__set('DEN_RUA',$result['DEN_RUA']);
                        $cadastro->__set('DEN_NUMERO',$result['DEN_NUMERO']);
                        $cadastro->__set('DEN_BAIRRO',$result['DEN_BAIRRO']);
                        $cadastro->__set('DEN_COMPLEMENTO',$result['DEN_COMPLEMENTO']);

                        return $cadastro;
                    }else{
                        return null;
                    }
                }
                catch(\PDOException $ex){
                    header('Location: /error103');
                    die();
                }
            
            }
            public function listar(){
                try{
                    $cadastros = array();
                    $sql = "SELECT * FROM denuncias";

                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->execute();

                    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    foreach($result as $row){

                        $cadastro = new CadastroModel();
            
                        $cadastro->__set('DEN_ID',$row['DEN_ID']);
                        $cadastro->__set('DEN_TITULO',$row['DEN_TITULO']);
                        $cadastro->__set('DEN_DESCRICAO',$row['DEN_DESCRICAO']);
                        $cadastro->__set('DEN_FOTO_VIDEO',$row['DEN_FOTO_VIDEO']);
                        $cadastro->__set('DEN_RUA',$row['DEN_RUA']);
                        $cadastro->__set('DEN_NUMERO',$row['DEN_NUMERO']);
                        $cadastro->__set('DEN_BAIRRO',$row['DEN_BAIRRO']);
                        $cadastro->__set('DEN_COMPLEMENTO',$row['DEN_COMPLEMENTO']);
                        $cadastro->__set('DEN_CEP',$row['DEN_CEP']);
                        $cadastro->__set('DEN_DATA_PUBLICACAO',$row['DEN_DATA_PUBLICACAO']);
                        $cadastro->__set('DEN_STATUS_DENUNCIA',$row['DEN_STATUS_DENUNCIA']);
                        $cadastro->__set('DEN_DATA_ALT_STATUS',$row['DEN_DATA_ALT_STATUS']);
                        $cadastro->__set('DEN_QDE_CURTIDAS',$row['DEN_QDE_CURTIDAS']);

                        // $cadastro->__set('email',$row['email']);
                        // $cadastro->__set('telefone',$row['telefone']);
                        // $cadastro->__set('assunto',$row['assunto']);
                        // $cadastro->__set('mensagem',$row['mensagem']);

                        array_push($cadastros, $cadastro);
                    }

                    return $cadastros;
                }
                catch(\PDOException $ex){
                    header('Location: /error103');
                    die();
                }
            }

        }