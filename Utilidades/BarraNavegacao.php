<div class="pull-right">
    <ul class="nav nav-pills">
        <li class="active"><a href="#" onclick = "home();">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Meu perfil <span class="caret"></span></a><!--onclick = "user();"-->
            <ul class="dropdown-menu">
                <li><a href="#" onclick="altera();">Atualizar cadastro</a></li>
                <li><a href="#" onclick="deleta();">Excluir cadastro</a></li>
                <li class="divider"></li>
                <li><a href="#" onclick="pesquisa();">Pesquisar</a></li>
            </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Livro <span class="caret"></span></a><!--onclick = "livro();"-->
            <ul class="dropdown-menu">
                <li><a href="#" onclick="meusLivros();">Meus Livros</a></li>
                <li><a href="#" onclick="livrosDisponiveis();">Livros Disponíveis</a></li>
                <li><a href="#" onclick="cadastraLivro();">Cadastrar livro</a></li>
                <li class="divider"></li>
                <li><a href="#" onclick="pesquisaLivro();">Pesquisar livro</a></li>
            </ul>
        </li>
        <li><a href = "../index.php">Sair</a></li>
    </ul>
</div>
