<?php

function conexao() {
    $host = 'localhost'; //endereço do banco(apache)
    $user = 'root'; //usuario do banco
    $password = ''; //senha
    $database = 'curso_ingles'; //nome do banco
    $port = '3306'; //numero da porta do host

    $link = mysqli_connect($host
            , $user
            , $password
            , $database
            , $port);

    if (mysqli_connect_error()) {
        exit("Erro ao conectar ao BD:" . mysqli_connect_error());
    } else {
        //echo'Validado!';
        return $link;
    }
}