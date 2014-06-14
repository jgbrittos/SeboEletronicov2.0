<div class="pull-right">
    <ul class="nav nav-pills">
        <li class="active"><a href="#" onclick = "home();">Home</a></li>
        <li><a href="#" onclick="altera();"> Meu perfil</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Livro <span class="caret"></span></a><!--onclick = "livro();"-->
            <ul class="dropdown-menu">
                <li><a href="#" onclick="meusLivros();">Meus Livros</a></li>
                <li><a href="#" onclick="livrosDisponiveis();">Livros Disponíveis</a></li>
                <li><a href="#" onclick="cadastraLivro();">Cadastrar livro</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Pesquisa <span class="caret"></span></a><!--onclick = "livro();"-->
            <ul class="dropdown-menu">
                <li><a href="#" data-toggle="modal" data-target="#modalPesquisaPessoa">Pessoa</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalPesquisaLivro">Livro</a></li>
            </ul>
        </li>
        <li><a href = "../index.php">Sair</a></li>
    </ul>
</div>

<!-- Modal pesquisar pessoa-->
<div class="modal fade" id="modalPesquisaPessoa" tabindex="-1" role="dialog" aria-labelledby="modalPesquisaPessoaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="modalPesquisaPessoaLabel"><b>Informe o nome da Pessoa procurada:</b></h5><br>
                <input type="text" name="nomeProcurado" id="nomeProcurado" class="form-control" placeholder="Nome da pessoa procurada">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="pesquisar" class="btn btn-primary" data-dismiss="modal" onclick="passaNomeProcurado()">Pesquisar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    function passaNomeProcurado() {
        $("input[name=nome]").val($("input[name=nomeProcurado]").val());
        document.FrmPesquisaPessoa.submit();
    }
</script>
<form  name="FrmPesquisaPessoa" action="../Utilidades/RecebeForm.php" method="post">
    <input type="hidden" name="tipo" value="pesquisar"/>
    <input type="hidden" name="nome" />
</form>

<!-- Modal pesquisar livro-->
<div class="modal fade" id="modalPesquisaLivro" tabindex="-1" role="dialog" aria-labelledby="modalPesquisaLivroLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="modalPesquisaLivroLabel"><b>Informe o nome do Livro procurado:</b></h5><br>
                <input type="text" name="nomeLivroProcurado" id="nomeLivroProcurado" class="form-control" placeholder="Nome do livro procurado">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="pesquisar" class="btn btn-primary" data-dismiss="modal" onclick="passaTituloProcurado()">Pesquisar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    function passaTituloProcurado() {
        $("input[name=titulo]").val($("input[name=nomeLivroProcurado]").val());
        document.FrmPesquisaLivro.submit();
    }
</script>
<form  name="FrmPesquisaLivro" action="../Utilidades/RecebeFormLivro.php" method="post">
    <input type="hidden" name="tipo" value="pesquisaLivro"/>
    <input type="hidden" name="titulo" />
</form>