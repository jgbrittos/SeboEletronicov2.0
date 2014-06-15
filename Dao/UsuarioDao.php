<?php

include "../Utilidades/ConexaoComBanco.php";

class UsuarioDao {

    private static $instance;
    
    private function __construct() {}

    //Singleton Pattern
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new UsuarioDao();
        }
        return self::$instance;
    }
    
    public function salvaUsuario($usuario){
        $senhaAux = $usuario->getSenha();
        $senhaFinal = $senhaAux[0];
         
        $sql="INSERT INTO senha (codigo_senha) VALUES ('".$senhaFinal."')";
        mysql_query($sql);

        $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaFinal."'";
        $resultado = $id_senha = mysql_query($sql2);
        $id_senha = mysql_fetch_array($resultado);

        $sql3="INSERT INTO usuario (nome_usuario, email_usuario, telefone_usuario, senha_usuario) VALUES ('".$usuario->getNome()."', '".$usuario->getEmail()."', 
            '".$usuario->getTelefone()."','".$id_senha['id_senha']."')";
        $usuarioRetorno = mysql_query($sql3);
        
        return $usuarioRetorno;
    }
    
    public function alteraUsuario($usuario, $idDoUsuario,$senhaVelha){

        $senhaAux = $usuario->getSenha();
        $senhaAlterar = $senhaAux[0];
                
        $sql="UPDATE usuario SET nome_usuario = '".$usuario->getNome()."' , telefone_usuario = '".$usuario->getTelefone()."', 
            email_usuario = '".$usuario->getEmail()."' WHERE id_usuario = '".$idDoUsuario."'";
        $usuario = mysql_query($sql);
        
        if($senhaAlterar != $senhaVelha){
            
            $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaVelha."'";
            $resultado = mysql_query($sql2);
            $id_senha = mysql_fetch_row($resultado);
            
            $sql3="Update senha SET codigo_senha = '".$senhaAlterar."' WHERE id_senha = '".$id_senha[0]."'";
            $senhaSalva = mysql_query($sql3);
            return true;
        }
        
        return false;
    }

    public function pesquisaUsuario($usuario){
        
        $sql="SELECT * FROM usuario WHERE nome_usuario = '".$usuario."'";
        $resultado=mysql_query($sql);
        //$user = mysql_fetch_row($resultado);
        $usuarios = array();
        while($registro = mysql_fetch_assoc($resultado) ) {
            array_push($usuarios, $registro);
	}
        
        return $usuarios;
    }
    
    public function deletaUsuario($id_usuario){
                
        $sql="SELECT senha_usuario FROM usuario WHERE id_usuario = '".$id_usuario."'";
        $senha = mysql_query($sql);
        $senha = mysql_fetch_array($senha);
        
        $sql="DELETE FROM usuario WHERE id_usuario = '".$id_usuario."'";
        $deletouUsuario = mysql_query($sql);

        $sql="DELETE FROM senha WHERE id_senha = '".$senha['senha_usuario']."'";
        $deleteouSenha = mysql_query($sql);
        
        return ($deletouUsuario&&$deleteouSenha);
        
    }

    public function pesquisaUsuarioPorParametroDao($atributo, $tipo_Atributo){
        
        $sql = "SELECT * FROM usuario WHERE $tipo_Atributo = '".$atributo."'";
        $usuario = mysql_query($sql);
        
        return mysql_fetch_array($usuario);        
    }
    
    public function getSenhaPorIdDao($id_senha){
        $sql = "SELECT * FROM senha WHERE id_senha = '".$id_senha."'";
        $senha = mysql_query($sql);
        
        return mysql_fetch_array($senha);
    }
}
