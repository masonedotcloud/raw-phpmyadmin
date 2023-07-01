<?php
// Includi il file di configurazione
require_once('config.php');
include_once('head.php');

// Funzione per ottenere i valori predefiniti dei campi dalla descrizione della tabella
function getFieldDefaultValues($result)
{
    $defaultValues = array();

    while ($row = $result->fetch_assoc()) {
        $fieldName = $row['Field'];
        $defaultValue = $row['Default'];
        $isNullable = ($row['Null'] === 'YES');
        $fieldType = $row['Type'];

        // Verifica se il campo non è nullable ma non ha un valore predefinito
        if (!$isNullable && $defaultValue === null) {
            $mandatoryFields[] = $fieldName;
        }

        // Formatta il valore predefinito per i campi di tipo data
        if (strpos($fieldType, 'date') !== false && $defaultValue !== null) {
            $defaultValue = formatDate($defaultValue);
        }

        // Aggiungi il valore predefinito all'array
        $defaultValues[$fieldName] = $defaultValue;
    }

    return $defaultValues;
}

// Funzione per inserire un nuovo record nella tabella
function insertRecord($conn, $tableName, $fields, $values)
{
    $fieldsString = implode(', ', $fields);

    // Modifica i valori per sostituire 'current_timestamp()' con la data attuale
    $values = array_map(function ($value) {
        return $value === 'current_timestamp()' ? date('Y-m-d H:i:s') : $value;
    }, $values);

    $valuesString = "'" . implode("', '", $values) . "'";
    $insertQuery = "INSERT INTO $tableName ($fieldsString) VALUES ($valuesString)";

    // Esegui la query di inserimento
    if ($conn->query($insertQuery) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Funzione per formattare una data nel formato corretto
function formatDate($date)
{
    $formattedDate = date('Y-m-d', strtotime($date));
    return $formattedDate !== false ? $formattedDate : null;
}

// Funzione per visualizzare un messaggio
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
        // Ottieni i valori predefiniti dei campi
        $defaultValues = getFieldDefaultValues($result);

        // Controlla se l'array $_POST contiene dei dati
        if (!empty($_POST)) {
            $fields = array();
            $values = array();

            // Recupera anche le informazioni sul tipo di campo
            $fieldTypes = array();

            foreach ($result as $row) {
                $fieldName = $row['Field'];
                $fieldType = $row['Type'];
                $fieldTypes[$fieldName] = $fieldType;
            }

            // Loop attraverso i dati POST per ottenere i campi e i valori
            foreach ($_POST as $key => $value) {
                if ($key !== 'table') {
                    // Verifica se il valore non è vuoto o se esiste un valore predefinito per il campo
                    if (!empty($value) || isset($defaultValues[$key])) {
                        $fields[] = $key;

                        // Se il valore è vuoto, utilizza il valore predefinito
                        if (empty($value) && isset($defaultValues[$key])) {
                            if (strpos($fieldTypes[$key], 'date') !== false) {
                                $values[] = null;  // Imposta il valore come null per i campi di tipo data vuoti
                            } else {
                                $values[] = $defaultValues[$key];
                            }
                        } else {
                            // Formatta il valore se il campo è di tipo data
                            if (strpos($fieldTypes[$key], 'date') !== false) {
                                $value = formatDate($value);
                            }
                            $values[] = $value;
                        }
                    }
                }
            }

            // Controlla se ci sono campi da inserire
            if (!empty($fields)) {
                // Esegue la funzione di inserimento del record
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

// Includi il file di chiusura
include_once('foot.php');
