<?php
// Includi il file di configurazione
require_once('config.php');
include_once('head.php');

// Funzione per generare i campi del modulo
function generateFormField($key, $value, $fieldType)
{
    echo "<div class='mb-3'>";
    echo "<label for='$key' class='form-label'>$key:</label>";

    // Determina il tipo di input in base al tipo di campo
    $inputType = 'text';
    if (strpos($fieldType, 'int') !== false) {
        $inputType = 'number';
    } elseif (strpos($fieldType, 'float') !== false || strpos($fieldType, 'double') !== false) {
        $inputType = 'number';
    } elseif (strpos($fieldType, 'date') !== false) {
        $inputType = 'date';
    } elseif (strpos($fieldType, 'time') !== false) {
        $inputType = 'date';
    }

    echo "<input type='$inputType' class='form-control' name='$key' value='$value'>";
    echo "</div>";
    echo "<input type='hidden' name='_phpmyadmin_manager_private_$key' value='$value'>";
}

// Funzione per verificare se ci sono dati disponibili in $_POST
function isPostDataAvailable()
{
    return !empty($_POST);
}

// Funzione per verificare se il parametro "table" è presente nell'URL
function isTableParameterAvailable()
{
    return isset($_GET['table']);
}

// Funzione per visualizzare un messaggio di errore
function displayErrorMessage($message)
{
    echo "<p>$message</p>";
}
?>

<div class="container">
    <div class="mt-4">
        <?php
        // Verifica se il parametro "table" è disponibile nell'URL
        if (isTableParameterAvailable()) {
            $tableName = $_GET['table'];

            if (isPostDataAvailable()) {
        ?>
                <h2 class="mb-4">Modifica Record</h2>
                <form method="post" action="aggiorna.php?table=<?php echo $tableName; ?>">
                    <?php
                    // Itera sui valori in $_POST
                    foreach ($_POST as $key => $value) {
                        // Supponendo che tu abbia le informazioni sul tipo di campo, puoi impostarlo manualmente qui
                        $fieldType = 'text';
                        generateFormField($key, $value, $fieldType);
                    }
                    ?>

                    <button type="submit" class="btn btn-primary">Salva modifiche</button>
                </form>
        <?php
            } else {
                displayErrorMessage("Dati mancanti per la modifica del record.");
            }
        } else {
            displayErrorMessage("Parametro 'table' mancante nell'URL.");
        }
        ?>
    </div>
</div>

<?php include_once('foot.php') ?>