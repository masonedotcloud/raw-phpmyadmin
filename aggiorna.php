<?php
require_once('config.php');
?>

<?php include_once('head.php');

// Controlla se il parametro "table" è presente nell'URL
if (isset($_GET['table'])) {
    $tableName = $_GET['table'];

    // Controlla se l'array $_POST contiene dei dati
    if (!empty($_POST)) {
        // Costruisci la clausola WHERE utilizzando i campi con il prefisso "_phpmyadmin_manager_private_"
        $whereConditions = "";
        $updateData = array();

        foreach ($_POST as $key => $value) {
            if (strstr($key, '_phpmyadmin_manager_private_') !== false) {
                $fieldName = substr($key, strlen('_phpmyadmin_manager_private_'));
                $whereConditions .= "$fieldName = '$value' AND ";
            } else {
                // Aggiungi il campo e il suo valore ai dati di aggiornamento
                $updateData[] = "$key = '$value'";
            }
        }

        $whereConditions = rtrim($whereConditions, " AND ");

        // Genera la query di aggiornamento
        $updateQuery = "UPDATE $tableName SET " . implode(', ', $updateData);

        if (!empty($whereConditions)) {
            $updateQuery .= " WHERE $whereConditions";
        } else {
            // Se la clausola WHERE è vuota, non eseguire l'aggiornamento
            die("Nessuna condizione di aggiornamento specificata.");
        }

        // Esegui la query di aggiornamento
        if ($conn->query($updateQuery) === TRUE) {
            // Mostra un messaggio di successo
            echo "<div class='container'>";
            echo "<div class='mt-4'>";
            echo "<div class='alert alert-success' role='alert'>Aggiornamento effettuato con successo.</div>";
            echo "</div>";
            echo "</div>";
        } else {
            // Mostra un messaggio di errore
            echo "<div class='container'>";
            echo "<div class='mt-4'>";
            echo "<div class='alert alert-danger' role='alert'>Errore durante l'aggiornamento: " . $conn->error . "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        // Nessun dato presente in $_POST
        echo "<div class='container'>";
        echo "<div class='mt-4'>";
        echo "<div class='alert alert-warning' role='alert'>Nessun dato presente in \$_POST.</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    // Parametro 'table' mancante nell'URL
    echo "<div class='container'>";
    echo "<div class='mt-4'>";
    echo "<div class='alert alert-danger' role='alert'>Parametro 'table' mancante nell'URL.</div>";
    echo "</div>";
    echo "</div>";
}

include_once('foot.php');
