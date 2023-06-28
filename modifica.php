<?php
// Includi il file di configurazione
require_once('config.php');
?>


<?php include_once('head.php') ?>

<body>
    <?php include_once('header.php') ?>
    <div class="container">
        <div class="mt-4">
            <?php
            // Controllo se il parametro "table" è presente nell'URL
            if (isset($_GET['table'])) {
                $tableName = $_GET['table'];

                if (!empty($_POST)) {
                    ?>
                    <h2 class="mb-4">Modifica Record</h2>
                    <form method="post" action="aggiorna.php?table=<?php echo $tableName; ?>">
                        <?php
                        // Controllo se l'array $_POST contiene dei dati
                        if (!empty($_POST)) {
                            // Iterazione sui valori presenti in $_POST
                            foreach ($_POST as $key => $value) {
                                // Generazione del campo del form corrispondente al valore
                                echo "<div class='mb-3'>";
                                echo "<label for='$key' class='form-label'>$key:</label>";
                                echo "<input type='text' class='form-control' name='$key' value='$value'>";
                                echo "</div>";
                                echo "<input type='hidden' name='_phpmyadmin_manager_private_$key' value='$value'>";
                            }
                        } else {
                            echo "<p>Nessun dato presente in \$_POST.</p>";
                        }
                        ?>

                        <button type="submit" class="btn btn-primary">Salva modifiche</button>
                    </form>
                    <?php
                } else {
                    echo "<p>Dati mancanti per la modifica del record.</p>";
                }
            } else {
                echo "<p>Parametro 'table' mancante nell'URL.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>
