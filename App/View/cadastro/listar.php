<?php if($this->getView()->cadastros): ?>
    <h2>Lista de Denúncias</h2>
    <table border=1>
        <thead>
            <tr>
                <th>ID</th>    
                <th>Título da Denúncia</th>
                <th>Data da Postagem</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->getView()->cadastros as $row): ?>
                <tr>
                    <td><?php echo $row->__get('DEN_ID'); ?></td>
                    <td><?php echo $row->__get('DEN_TITULO'); ?></td>
                    <td><?php echo $row->__get('DEN_DATA_PUBLICACAO'); ?></td>
                    <td><?php echo $row->__get('DEN_STATUS_DENUNCIA'); ?></td>
                    <td>
                        <a href="<?php echo '/editar?id='.$row->__get('DEN_ID'); ?>" >Editar</a> / 
                        <a href="<?php echo '/excluir?id='.$row->__get('DEN_ID'); ?>" >Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <h1>Nenhum cadastro encontrado</h1>
<?php endif; ?>
