<section id="conteudo-principal">
<form action="/cadastroeditar" method="POST">
    <label>Título</label>
    <input type="text" name="DEN_TITULO" id="DEN_TITULO" value="<?php echo $this->getView()->result->__get('DEN_TITULO'); ?>"><br>
    <label>Descrição</label>
    <input type="text" name="DEN_DESCRICAO" id="DEN_DESCRICAO" value="<?php echo $this->getView()->result->__get('DEN_DESCRICAO'); ?>"><br>
    <label>Selecionar Foto/Vídeo</label>
    <input type="file" name="DEN_FOTO_VIDEO" id="DEN_FOTO_VIDEO"value="<?php echo $this->getView()->result->__get('DEN_FOTO_VIDEO'); ?>"><br>
    <label>Localização</label>
    <input type="text" name="DEN_RUA" id="DEN_RUA"value="<?php echo $this->getView()->result->__get('DEN_RUA'); ?>"><br>
    <input type="number" name="DEN_NUMERO" id="DEN_NUMERO"value="<?php echo $this->getView()->result->__get('DEN_NUMERO'); ?>"><br>
    <input type="text" name="DEN_BAIRRO" id="DEN_BAIRRO"value="<?php echo $this->getView()->result->__get('DEN_BAIRRO'); ?>"><br>
    <input type="text" name="DEN_COMPLEMENTO" id="DEN_COMPLEMENTO"value="<?php echo $this->getView()->result->__get('DEN_COMPLEMENTO'); ?>"><br>

    
    <input type="hidden" name="DEN_ID" id="DEN_ID" value="<?php echo $this->getView()->result->__get('DEN_ID'); ?>">

    <input type="submit" value="Enviar">
</form>
</section>
