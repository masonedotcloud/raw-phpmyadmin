<?php
require_once('config.php');

// Controlla se il parametro "table" è presente nell'URL
if (isset($_GET['table'])) {
    $tableName = $_GET['table'];

    // Controlla se l'array $_POST contiene dei dati
    if (!empty($_POST)) {
        // Costruisci l'array dei campi e dei valori da inserire
        $fields = array();
        $values = array();

        foreach ($_POST as $key => $value) {
            // Ignora il campo "table" nell'array $_POST
       
                $fields[] = $key;
                $values[] = $value;
   
        }

        // Crea la stringa dei campi e dei valori
        $fieldsString = implode(', ', $fields);
        $valuesString = implode("', '", $values);

        // Genera la query di inserimento
        $insertQuery = "INSERT INTO $tableName ($fieldsString) VALUES ('$valuesString')";

        // Esegui la query di inserimento
        if ($conn->query($insertQuery) === TRUE) {
            echo "<div class='container'>";
            echo "<div class='mt-4'>";
            echo "<div class='alert alert-success' role='alert'>Record aggiunto con successo.</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div class='container'>";
            echo "<div class='mt-4'>";
            echo "<div class='alert alert-danger' role='alert'>Errore durante l'aggiunta del record: " . $conn->error . "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='container'>";
        echo "<div class='mt-4'>";
        echo "<div class='alert alert-danger' role='alert'>Nessun dato presente in \$_POST.</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<div class='container'>";
    echo "<div class='mt-4'>";
    echo "<div class='alert alert-danger' role='alert'>Parametro 'table' mancante nell'URL.</div>";
    echo "</div>";
    echo "</div>";
}
?>
