<?php

 // Configurazione del database
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "paschit";

 // Creazione della connessione
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Controllo della connessione
 if ($conn->connect_error) {
     die("Connessione fallita: " . $conn->connect_error);
 }