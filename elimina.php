<?php
// Includi il file di configurazione
require_once('config.php');
include_once('head.php');
?>

<div class="container">
    <div class="mt-4">
        <?php
        // Controlla se i dati necessari sono presenti nel $_POST
        if (isset($_GET['table'])) {
            $tableName = $_GET['table'];

            // Verifica se ci sono condizioni da aggiungere alla query di eliminazione
            if (count($_POST) > 1) {
                // Crea la parte iniziale della query di eliminazione
                $query = "DELETE FROM $tableName WHERE ";

                // Array per memorizzare le condizioni
                $conditions = array();

                // Itera sui valori presenti in $_POST
                foreach ($_POST as $key => $value) {
                    // Salta il valore 'table' poiché è utilizzato solo per indicare la tabella
                    if ($key === 'table') {
                        continue;
                    }

                    // Escape dei caratteri speciali per evitare SQL injection
                    $columnName = $conn->real_escape_string($key);
                    $columnValue = $conn->real_escape_string($value);

                    // Aggiungi la condizione alla lista delle condizioni
                    $conditions[] = "$columnName = '$columnValue'";
                }

                // Componi la query di eliminazione con le condizioni
                $query .= implode(' AND ', $conditions);

                // Esegui la query
                if ($conn->query($query) === TRUE) {
                    // Mostra un messaggio di successo se la query di eliminazione ha avuto successo
                    echo "<div class='container'>";
                    echo "<div class='mt-4'>";
                    echo "<div class='alert alert-success' role='alert'>Record eliminato con successo.</div>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    // Mostra un messaggio di errore se si verifica un problema durante l'eliminazione del record
                    echo "<div class='container'>";
                    echo "<div class='mt-4'>";
                    echo "<div class='alert alert-danger' role='alert'>Errore durante l'eliminazione del record: " . $conn->error . "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                // Mostra un messaggio di avviso se non sono specificate condizioni per l'eliminazione del record
                echo "<div class='container'>";
                echo "<div class='mt-4'>";
                echo "<div class='alert alert-danger' role='alert'>Nessuna condizione specificata per l'eliminazione del record.</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            // Mostra un messaggio di errore se i dati necessari per l'eliminazione del record sono mancanti
            echo "<div class='container'>";
            echo "<div class='mt-4'>";
            echo "<div class='alert alert-danger' role='alert'>Dati mancanti per l'eliminazione del record.</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<?php include_once('foot.php') ?>
