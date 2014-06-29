<?php

interface LivroDao {
    public function salvaLivro($livro, $id_dono);
    public function pesquisaLivro($titulo);
    public function alteraLivro($livro, $id_dono, $id_usuario);
    public function deletaLivro($id);
}
