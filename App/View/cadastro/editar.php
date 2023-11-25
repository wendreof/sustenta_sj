<section id="conteudo-principal">
<form action="/cadastroeditar" method="POST">
    <label>Nome</label>
    <input type="text" name="nome" id="nome" value="<?php echo $this->getView()->result->__get('nome'); ?>"><br>
    <label>Email</label>
    <input type="text" name="email" id="email" value="<?php echo $this->getView()->result->__get('email'); ?>"><br>
    <label>Telefone</label>
    <input type="text" name="telefone" id="telefone"value="<?php echo $this->getView()->result->__get('telefone'); ?>"><br>
    <label>Assunto</label>
    <input type="text" name="assunto" id="assunto"value="<?php echo $this->getView()->result->__get('assunto'); ?>"><br>
    <label>Mensagem</label>
    <textarea name="mensagem" id="mensagem"><?php echo $this->getView()->result->__get('mensagem'); ?></textarea><br>
    <input type="hidden" name="id" value="<?php echo $this->getView()->result->__get('id'); ?>">

    <input type="submit" value="Enviar">
</form>
</section>