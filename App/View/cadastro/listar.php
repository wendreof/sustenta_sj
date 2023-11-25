<?php if($this->getView()->cadastros){ ?>
    <table border=1>
        <th>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>E-Mail</td>
                <td>Telefone</td>
                <td>Assunto</td>
                <td>Mensagem</td>
                <td>Ações</td>
            </tr>
        </th>
        <?php foreach($this->getView()->cadastros as $row){ ?>
            <tr>
                <td><?php echo $row->__get('id'); ?></td>
                <td><?php echo $row->__get('nome'); ?></td>
                <td><?php echo $row->__get('email'); ?></td>
                <td><?php echo $row->__get('telefone'); ?></td>
                <td><?php echo $row->__get('assunto'); ?></td>
                <td><?php echo $row->__get('mensagem'); ?></td>
                <td><a href="<?php echo '/editar?id='.$row->__get('id'); ?>" >Editar</a> / <a href="<?php echo '/excluir?id='.$row->__get('id'); ?>" >Excluir</a></td>
            </tr>
        <?php } ?>

    </table>
<?php }else{
    echo "<h1> Nenhum cadastro encontrado";
} ?>