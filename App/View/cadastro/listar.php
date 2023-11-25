<?php if($this->getView()->cadastros){ ?>
    <table border=1>
           <h2>Lista de Denúncias</h2>
            <th>
            <tr>
                <td>ID</td>    
                <td>Título da Denúncia</td>
                <td>Data da Postagem</td>
                <td>Status</td>
                <td>Ações</td>
            </tr>
        </th>
        <?php foreach($this->getView()->cadastros as $row){ ?>
            <tr>
                <td><?php echo $row->__get('DEN_ID'); ?></td>
                <td><?php echo $row->__get('DEN_TITULO'); ?></td>
                <td><?php echo $row->__get('DEN_DATA_PUBLICACAO'); ?></td>
                <td><?php echo $row->__get('DEN_STATUS_DENUNCIA'); ?></td>
                <td><a href="<?php echo '/editar?id='.$row->__get('DEN_ID'); ?>" >Editar</a> / <a href="<?php echo '/excluir?id='.$row->__get('DEN_ID'); ?>" >Excluir</a></td>
            </tr>
        <?php } ?>

    </table>
<?php }else{
    echo "<h1> Nenhum cadastro encontrado";
} ?>