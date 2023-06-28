<?php

 // Configurazione del database
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "questionario_2";

 // Creazione della connessione
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Controllo della connessione
 if ($conn->connect_error) {
     die("Connessione fallita: " . $conn->connect_error);
 }