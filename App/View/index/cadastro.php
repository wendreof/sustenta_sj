<section id="conteudo-principal">
<form action="/cadastroenvio" method="POST">
    <h2>Cadastro de Denúncia</h2>
    <label>Título</label>
    <input type="text" name="DEN_TITULO" id="DEN_TITULO" placeholder="Título da sua denúncia"><br>

    <label>Descrição</label>
    <input type="text" name="DEN_DESCRICAO" id="DEN_DESCRICAO" placeholder="Descrição do problema"><br>

    <label>Selecionar Foto/Vídeo</label>
    <input type="file" name="DEN_FOTO_VIDEO" id="DEN_FOTO_VIDEO" placeholder="Escolher arquivo"><br>

    <label>Localização</label>
    <input type="text" name="DEN_RUA" id="DEN_RUA" placeholder="Rua"><br>
    <input type="number" name="DEN_NUMERO" id="DEN_NUMERO" placeholder="Número"><br>
    <input type="text" name="DEN_BAIRRO" id="DEN_BAIRRO" placeholder="Bairro"><br>
    <input type="text" name="DEN_COMPLEMENTO" id="DEN_COMPLEMENTO" placeholder="Ponto de Referência"><br>

    <input type="submit" value="Enviar">
</form>
</section>