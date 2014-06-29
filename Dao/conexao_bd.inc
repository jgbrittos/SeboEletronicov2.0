<?php
    $connect = mysql_connect("localhost", "root", "");
    if (!$connect) {
        die ("<h1>Falha na Conexao </h1>");
    }

    $bd = mysql_select_db ("sebo eletronico");
    
    /*

    $connect = mysql_connect("mysql.hostinger.com.br", "u367438131_root", "seboeletronicodsw");
    if (!$connect) {
        die ("<h1>Falha na Conexao </h1>");
    }

    $bd = mysql_select_db ("u367438131_sebo");


    */