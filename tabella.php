<?php
require_once('config.php');
?>

<?php include_once('head.php') ?>

<body>
    <?php include_once('header.php') ?>
    <div class="container">
        <div class="mt-4">
            <?php
            // Controlla se il parametro "view" è presente nell'URL
            if (isset($_GET['table'])) {
                $tableName = $_GET['table'];

                // Query per ottenere il contenuto della tabella specificata
                $query = "SELECT * FROM $tableName";
                $result = $conn->query($query);

                // Controllo del risultato della query
                if ($result->num_rows > 0) {
                    echo "<h2 class='mb-4'>Contenuto della tabella: $tableName</h2>";

                    echo "<form action='aggiungi.php?table=$tableName' method='post'>";
                    $result_add = $conn->query($query);
                    while ($fieldInfo_new = $result_add->fetch_field()) {
                        echo "<input type='hidden' name='$fieldInfo_new->name'>";
                    }
                    echo "<button type='submit' class='btn btn-success'>Aggiungi record</button>";

                    echo "</form><br>";
                    
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-bordered table-striped'>";
                    echo "<thead class='thead-dark'>";

                    // Intestazione della tabella con i nomi delle colonne
                    echo "<tr>";

                    while ($fieldInfo = $result->fetch_field()) {
                        echo "<th scope='col'>$fieldInfo->name</th>";
                    }

                    // Aggiungi le colonne "Modifica" ed "Elimina"
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

                        // Aggiungi il form per la modifica
                        echo "<td>
                            <form action='modifica.php?table=$tableName' method='post'>";

                        // Iterazione sui valori delle colonne per il form di modifica
                        foreach ($row as $column => $value) {
                            echo "<input type='hidden' name='$column' value='$value'>";
                        }

                        echo "<button type='submit' class='btn btn-primary btn-sm'><i class='bi bi-pencil-square'></i> Modifica</button>
                            </form>
                        </td>";

                        // Aggiungi il form per l'eliminazione
                        echo "<td>
                            <form action='elimina.php?table=$tableName' method='post'>";

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
                    echo "<form action='aggiungi.php?table=$tableName' method='post'>";
                    $result_add = $conn->query($query);
                    while ($fieldInfo_new = $result_add->fetch_field()) {
                        echo "<input type='hidden' name='$fieldInfo_new->name'>";
                    }
                    echo "<button type='submit' class='btn btn-success'>Aggiungi record</button>";

                    echo "</form><br>";
                }
            } else {
                echo "<p>Parametro 'table' mancante nell'URL.</p>";
                
            }

            // Chiudi la connessione al database
            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>
