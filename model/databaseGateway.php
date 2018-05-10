<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class databaseGateway
{
     public function insert( $username, $password) {
        echo "dfsydsvya";
       $dbusername = ($username != NULL)?"'".mysql_real_escape_string($username)."'":'NULL';
        $dbPassword = ($password != NULL)?"'".mysql_real_escape_string($password)."'":'NULL';
//      //  $dbEmail = ($confirm_password != NULL)?"'".mysql_real_escape_string($email)."'":'NULL';
//       // $dbAddress = ($address != NULL)?"'".mysql_real_escape_string($address)."'":'NULL';
//        
     mysql_query("INSERT INTO users (username, password) VALUES ($dbusername, $dbPassword)");
        return mysql_insert_id();
    }
}
?>
