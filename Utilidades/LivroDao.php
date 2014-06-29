<?php

interface LivroDao {
    public function salvaLivro($livro, $id_dono);
    public function alteraLivro($livro, $id_livro);
    public function pesquisaLivro($titulo);
}
