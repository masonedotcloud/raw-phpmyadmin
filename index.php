<?php include_once('head.php') ?>

<body>
    <?php include_once('header.php') ?>
    <div class="row m-3">
        <?php
        require_once('config.php');

        // Query per ottenere la lista delle tabelle nel database
        $query = "SHOW TABLES";
        $result = $conn->query($query);

        // Controllo del risultato della query
        if ($result) {
            // Iterazione sui risultati
            while ($row = $result->fetch_assoc()) {
                $tableName = $row["Tables_in_$dbname"];

                // Query per ottenere i campi della tabella corrente
                $fieldsQuery = "DESCRIBE $tableName";
                $fieldsResult = $conn->query($fieldsQuery);

                // Controllo del risultato della query
                if ($fieldsResult) {
                    echo "<div class='col-auto'>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead><tr><th colspan='2'><a href='tabella.php?table=" . urlencode($tableName) . "'>$tableName</a></th></tr></thead>";
                    echo "<tbody>";

                    // Iterazione sui campi della tabella
                    while ($field = $fieldsResult->fetch_assoc()) {
                        $fieldName = $field['Field'];
                        $fieldType = $field['Type'];

                        echo "<tr><td>$fieldName</td><td>$fieldType</td></tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<div class='col-auto'>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead><tr><th colspan='2'><a href='tabella.php?table=" . urlencode($tableName) . "'>$tableName</a></th></tr></thead>";
                    echo "<tbody>";
                    echo "<tr><td colspan='2'>Nessun campo trovato nella tabella.</td></tr>";
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                }
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Errore durante l'ottenimento della lista delle tabelle: " . $conn->error . "</div>";
        }

        // Chiudi la connessione al database
        $conn->close();
        ?>
    </div>
</body>

</html>
