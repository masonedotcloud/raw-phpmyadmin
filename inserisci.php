<?php
require_once('config.php');
include_once('head.php');

function getFieldDefaultValues($result)
{
    $defaultValues = array();

    while ($row = $result->fetch_assoc()) {
        $fieldName = $row['Field'];
        $defaultValue = $row['Default'];
        $isNullable = ($row['Null'] === 'YES');
        $fieldType = $row['Type'];

        if (!$isNullable && $defaultValue === null) {
            $mandatoryFields[] = $fieldName;
        }

        if (strpos($fieldType, 'date') !== false && $defaultValue !== null) {
            $defaultValue = formatDate($defaultValue);
        }

        $defaultValues[$fieldName] = $defaultValue;
    }

    return $defaultValues;
}

function insertRecord($conn, $tableName, $fields, $values)
{
    $fieldsString = implode(', ', $fields);

    // Modifica i valori per sostituire 'current_timestamp()' con la data attuale
    $values = array_map(function ($value) {
        return $value === 'current_timestamp()' ? date('Y-m-d H:i:s') : $value;
    }, $values);

    $valuesString = "'" . implode("', '", $values) . "'";
    $insertQuery = "INSERT INTO $tableName ($fieldsString) VALUES ($valuesString)";

    if ($conn->query($insertQuery) === TRUE) {
        return true;
    } else {
        return false;
    }
}


function formatDate($date)
{
    $formattedDate = date('Y-m-d', strtotime($date));
    return $formattedDate !== false ? $formattedDate : null;
}

function displayMessage($type, $message)
{
    echo "<div class='container'>";
    echo "<div class='mt-4'>";
    echo "<div class='alert alert-$type' role='alert'>$message</div>";
    echo "</div>";
    echo "</div>";
}

// Controlla se il parametro "table" è presente nell'URL
if (isset($_GET['table'])) {
    $tableName = $_GET['table'];

    // Ottieni le informazioni sui campi della tabella dal database
    $query = "DESCRIBE $tableName";
    $result = $conn->query($query);

    if ($result) {
        $defaultValues = getFieldDefaultValues($result);

        // Controlla se l'array $_POST contiene dei dati
        if (!empty($_POST)) {
            $fields = array();
            $values = array();

            // Modifica: recupera anche le informazioni sul tipo di campo
            $fieldTypes = array();

            foreach ($result as $row) {
                $fieldName = $row['Field'];
                $fieldType = $row['Type'];
                $fieldTypes[$fieldName] = $fieldType;
            }

            foreach ($_POST as $key => $value) {
                if ($key !== 'table') {
                    if (!empty($value) || isset($defaultValues[$key])) {
                        $fields[] = $key;

                        if (empty($value) && isset($defaultValues[$key])) {
                            if (strpos($fieldTypes[$key], 'date') !== false) {
                                $values[] = null;  // Imposta il valore come null per i campi di tipo data vuoti
                            } else {
                                $values[] = $defaultValues[$key];
                            }
                        } else {
                            if (strpos($fieldTypes[$key], 'date') !== false) {
                                $value = formatDate($value);
                            }
                            $values[] = $value;
                        }
                    }
                }
            }


            if (!empty($fields)) {
                if (insertRecord($conn, $tableName, $fields, $values)) {
                    displayMessage('success', 'Record aggiunto con successo.');
                } else {
                    displayMessage('danger', 'Errore durante l\'aggiunta del record: ' . $conn->error);
                }
            } else {
                displayMessage('warning', 'Nessun campo da inserire.');
            }
        } else {
            displayMessage('danger', 'Nessun dato presente in $_POST.');
        }
    } else {
        displayMessage('danger', 'Errore durante l\'ottenimento delle informazioni sui campi della tabella: ' . $conn->error);
    }
} else {
    displayMessage('danger', 'Parametro \'table\' mancante nell\'URL.');
}

include_once('foot.php');
