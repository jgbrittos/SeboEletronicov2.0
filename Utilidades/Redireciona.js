function livrosDisponiveis(){
    window.location="../Visao/livrosDisponiveis.php";
}

function meusLivros(){
    window.location="../Visao/meusLivros.php";
}

function home(){
    window.location="../Visao/indexLogin.php";
}

function user(){
    window.location="../Visao/indexUsuario.php";
}

function cadastra(){
    window.location="../Visao/cadastrarUsuario.php";
}

function altera(){
    window.location="../Visao/alteraUsuario.php";
}

function deleta(){
    window.location="../Visao/excluiUsuario.php";
}

function pesquisa(){
    window.location="../Visao/pesquisarUsuario.php";
}

function cadastraLivro(){
    window.location="../Visao/cadastrarLivro.php";
}

function pesquisaLivro() {
    window.location="../Visao/pesquisarLivro.php";
}

function deletaLivro() {
    window.location="../Visao/excluirLivro.php";
}

function livro(){
    window.location="../Visao/indexLivro.php";
}
function login(){
    window.location="../Visao/entrarLogin.php";
}
function sair(){
    window.location="../index.php";
}
function loginsuccessfully(id){
    window.location='../Visao/indexLogin.php?idUser=id';
}
function loginfailed(){
    setTimeout("window.location='../Visao/entrarLogin.php'",0);
}