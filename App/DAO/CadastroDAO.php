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
                                DEN_COMPLEMENTO
                            ) values(
                                :DEN_TITULO,
                                :DEN_DESCRICAO,
                                :DEN_FOTO_VIDEO,
                                :DEN_RUA,
                                :DEN_NUMERO,
                                :DEN_BAIRRO,
                                :DEN_COMPLEMENTO
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
                    $sql = "DELETE FROM cadastro WHERE id=:id";
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
                    $sql = "UPDATE cadastro
                            SET
                            nome=:nome,
                            email=:email,
                            telefone=:telefone,
                            assunto=:assunto,
                            mensagem=:mensagem
                            WHERE
                            id=:id";

                            $stmt = $this->getConn()->prepare($sql);
                            $id = $var->__get('id');
                            $nome = $var->__get('nome');
                            $email = $var->__get('email');
                            $telefone = $var->__get('telefone');
                            $assunto = $var->__get('assunto');
                            $mensagem = $var->__get('mensagem');


                            $stmt->bindParam(':id', $id);
                            $stmt->bindParam(':nome', $nome);
                            $stmt->bindParam(':email', $email);
                            $stmt->bindParam(':telefone', $telefone);
                            $stmt->bindParam(':assunto', $assunto);
                            $stmt->bindParam(':mensagem', $mensagem);

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
                    $sql = "SELECT * FROM cadastro WHERE id=:id";

                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->bindParam(":id",$id);
                    $stmt->execute();

                    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if($result > 0){

                        $cadastro = new CadastroModel();
                        $cadastro->__set('id',$result['id']);
                        $cadastro->__set('nome',$result['nome']);
                        $cadastro->__set('email',$result['email']);
                        $cadastro->__set('telefone',$result['telefone']);
                        $cadastro->__set('assunto',$result['assunto']);
                        $cadastro->__set('mensagem',$result['mensagem']);

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
                        $cadastro->__set('DEN_TITULO',$row['DEN_TITULO']);
                        $cadastro->__set('DEN_DESCRICAO',$row['DEN_DESCRICAO']);
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