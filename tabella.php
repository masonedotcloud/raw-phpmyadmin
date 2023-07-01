<?php
// Includi il file di configurazione
require_once('config.php');

// Funzione per stampare il contenuto della tabella
function printTableContent($conn, $tableName)
{
    // Query per ottenere il contenuto della tabella specificata
    $query = "SELECT * FROM $tableName";
    $result = $conn->query($query);

    // Controllo del risultato della query
    if ($result->num_rows > 0) {
        echo "<h2 class='mb-4'>Contenuto della tabella: $tableName</h2>";

        // Link per aggiungere un nuovo record alla tabella
        echo "<p><a href='aggiungi.php?table=$tableName' class='btn btn-success'>Aggiungi record</a></p>";

        // Tabella per visualizzare i dati della tabella specificata
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead class='thead-dark'>";

        // Intestazione della tabella con i nomi delle colonne
        echo "<tr>";
        while ($fieldInfo = $result->fetch_field()) {
            echo "<th scope='col'>$fieldInfo->name</th>";
        }

        // Aggiunta delle colonne "Modifica" ed "Elimina"
        echo "<th scope='col'>Modifica</th>";
        echo "<th scope='col'>Elimina</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Iterazione sui risultati della query
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";

            // Iterazione sui valori delle colonne
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }

            // Form per la modifica di un record
            echo "<td>
                    <form action='modifica.php?table=$tableName' method='post'>";

            // Aggiunta di campi nascosti per ciascuna colonna del record
            foreach ($row as $column => $value) {
                echo "<input type='hidden' name='$column' value='$value'>";
            }

            echo "<button type='submit' class='btn btn-primary btn-sm'><i class='bi bi-pencil-square'></i> Modifica</button>
                    </form>
                </td>";

            // Form per l'eliminazione di un record
            echo "<td>
                    <form action='elimina.php?table=$tableName' method='post'>";

            // Aggiunta di campi nascosti per ciascuna colonna del record
            foreach ($row as $column => $value) {
                echo "<input type='hidden' name='$column' value='$value'>";
            }

            echo "<button type='submit' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i> Elimina</button>
                    </form>
                </td>";

            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<p>Nessun dato presente nella tabella: $tableName</p>";

        // Form per aggiungere un nuovo record alla tabella
        echo "<form action='aggiungi.php?table=$tableName' method='post'>";
        $result_add = $conn->query($query);

        // Aggiunta di campi nascosti per ciascuna colonna della tabella
        while ($fieldInfo_new = $result_add->fetch_field()) {
            echo "<input type='hidden' name='$fieldInfo_new->name'>";
        }

        echo "<button type='submit' class='btn btn-success'>Aggiungi record</button>";
        echo "</form><br>";
    }
}

?>

<?php include_once('head.php') ?>

<div class="container">
    <div class="mt-4">
        <?php
        // Controlla se il parametro "table" è presente nell'URL
        if (isset($_GET['table'])) {
            $tableName = $_GET['table'];
            printTableContent($conn, $tableName);
        } else {
            echo "<p>Parametro 'table' mancante nell'URL.</p>";
        }
        ?>
    </div>
</div>

<?php include_once('foot.php') ?>