<?php
// Configurazione del database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "raw-phpmyadmin";

// Creazione della connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    // Mostra un messaggio di errore se la connessione fallisce
    die("Connessione fallita: " . $conn->connect_error);
}
