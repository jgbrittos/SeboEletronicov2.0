<?php

include '../Modelo/Usuario.php';

class UsuarioControlador {
    
    public function __construct(){}
    
    public function salvaUsuario($nome, $email, $telefone, $senha){
        try{
            $usuario = new Usuario($nome, $telefone, $email, $senha);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='../Visao/cadastrarUsuario.php'; </script>";
            exit;    
        }
        $usuarioDao = UsuarioDao::getInstance();
        
        return $usuarioDao->salvaUsuario($usuario);
    }

    public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
        try{

            $usuario = new Usuario($nome, $telefone, $email, $senha);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='../Visao/alteraUsuario.php'; </script>";
            exit;    
        }
       return UsuarioDao::alteraUsuario($usuario,$id, $senhaVelha);

    }

    public function deletaCadastro($id_usuario){
        $usuarioDao = UsuarioDao::getInstance();
        
        return $usuarioDao->deletaUsuario($id_usuario);

    }

    public function pesquisaUsuario($nome){
        return UsuarioDao::pesquisaUsuario($nome);
    } 

    public function pesquisaUsuarioPorParametro($atributo, $tipo_Atributo){
        $usuarioDao = UsuarioDao::getInstance();
        $atributosUsuario = $usuarioDao->pesquisaUsuarioPorParametroDao($atributo, $tipo_Atributo);
        $senhaParcial = (int) $this->getSenhaPorId($atributosUsuario['senha_usuario']);
        $senha = Array();
        $senha[0] = $senhaParcial;
        $senha[1] = $senhaParcial;
        $usuario = UsuarioControlador::criaObjetoUsuario($atributosUsuario['nome_usuario'], 
                $atributosUsuario['telefone_usuario'], $atributosUsuario['email_usuario'], $senha);
        return $usuario;
    }
    //possivel padrao GRASP Criador/Especialista
    public function criaObjetoUsuario($nome, $telefone, $email, $senha){
        $usuario = new Usuario($nome, $telefone, $email, $senha);
        return $usuario;
    }

    public function getSenhaPorId($id_senha){
        $senha = UsuarioDao::getSenhaPorIdDao($id_senha);
        return $senha['codigo_senha'];
    } 
}

/*
[mail function]
; XAMPP: Comment out this if you want to work with an SMTP Server like Mercury
; SMTP = localhost
; smtp_port = 25
*/