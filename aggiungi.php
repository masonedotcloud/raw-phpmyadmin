<?php
// Includi il file di configurazione
require_once('config.php');

function getFieldInfo($conn, $tableName)
{
    // Query per ottenere le informazioni sui campi della tabella corrente
    $query = "DESCRIBE $tableName";
    $result = $conn->query($query);
    if ($result) {
        $fields = array();
        while ($row = $result->fetch_assoc()) {
            $fields[] = $row;
        }
        return $fields;
    } else {
        return false;
    }
}

function isFieldRequired($fieldInfo)
{
    // Verifica se il campo è obbligatorio
    $isNullable = ($fieldInfo['Null'] !== 'NO');
    $hasDefault = ($fieldInfo['Default'] !== null);
    $isAutoIncrement = (strpos($fieldInfo['Extra'], 'auto_increment') !== false);
    return !($isNullable || $hasDefault || $isAutoIncrement);
}

function printFieldInput($fieldInfo)
{
    // Stampa l'input per il campo specificato
    $fieldName = $fieldInfo['Field'];
    $fieldType = $fieldInfo['Type'];

    echo "<div class='mb-3'>";
    echo "<label for='$fieldName'>$fieldName:</label>";

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

    // Verifica se il campo ha un valore di default o è autoincrementante
    $isAutoIncrement = (strpos($fieldInfo['Extra'], 'auto_increment') !== false);
    $defaultValueAttribute = '';

    if ($fieldInfo['Default'] !== null && !$isAutoIncrement) {
        $defaultValueAttribute = "value='{$fieldInfo['Default']}'";
    }

    echo "<input type='$inputType' class='form-control' name='$fieldName' $defaultValueAttribute>";
    echo "<small class='text-muted'>($fieldType)</small>";
    echo "</div>";
}

?>

<?php include_once('head.php') ?>

<div class="container">
    <div class="mt-4">
        <?php
        if (isset($_GET['table'])) {
            $tableName = $_GET['table'];

            $fields = getFieldInfo($conn, $tableName);

            if ($fields) {
                $mandatoryFields = array();

                echo "<h2 class='mb-4'>Aggiunta record nella tabella: $tableName</h2>";
                echo "<form action='inserisci.php?table=$tableName' method='post'>";

                foreach ($fields as $fieldInfo) {
                    printFieldInput($fieldInfo);
                    if (isFieldRequired($fieldInfo)) {
                        $mandatoryFields[] = $fieldInfo['Field'];
                    }
                }

                if (!empty($mandatoryFields)) {
                    echo "<p class='text-danger'>I seguenti campi sono obbligatori: " . implode(', ', $mandatoryFields) . "</p>";
                }

                echo "<button type='submit' class='btn btn-success'>Aggiungi record</button>";
                echo "</form>";
            } else {
                // Mostra un messaggio di errore se non è possibile ottenere le informazioni sui campi della tabella
                echo "<div class='alert alert-danger' role='alert'>Errore durante l'ottenimento delle informazioni sui campi della tabella: " . $conn->error . "</div>";
            }
        } else {
            // Mostra un messaggio se il parametro 'table' manca nell'URL
            echo "<p>Parametro 'table' mancante nell'URL.</p>";
        }
        ?>
    </div>
</div>

<?php include_once('foot.php') ?>