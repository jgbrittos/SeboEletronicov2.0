<?php

interface LivroDao {
    public function salvaLivro($livro, $id_dono);
    public function alteraLivro($livro, $id_dono, $id_usuario);
}
