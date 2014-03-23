<?php
    
        $server = "localhost";
        $username = "root";
        $senha = "";
        $dbcon = mysql_connect($server, $username, $senha);
        
        if(!$dbcon){
            die ("Não foi possível conectar: " . mysql_error());
        }
        $bd = mysql_select_db ("sebo eletronico");
        
      
   
?>
