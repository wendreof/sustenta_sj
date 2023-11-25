<?php if($this->getView()->cadastros){ ?>
    <table border=1>
        <th>
            <tr>
                <td>DEN_TITULO</td>
                <td>DEN_DESCRICAO</td>
            </tr>
        </th>
        <?php foreach($this->getView()->cadastros as $row){ ?>
            <tr>
                <td><?php echo $row->__get('DEN_TITULO'); ?></td>
                <td><?php echo $row->__get('DEN_DESCRICAO'); ?></td>
                <td><a href="<?php echo '/editar?id='.$row->__get('id'); ?>" >Editar</a> / <a href="<?php echo '/excluir?id='.$row->__get('id'); ?>" >Excluir</a></td>
            </tr>
        <?php } ?>

    </table>
<?php }else{
    echo "<h1> Nenhum cadastro encontrado";
} ?>