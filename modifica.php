<?php
require_once('config.php');
include_once('head.php');

// Function to generate form fields
function generateFormField($key, $value, $fieldType)
{
    echo "<div class='mb-3'>";
    echo "<label for='$key' class='form-label'>$key:</label>";

    // Determine the input type based on the field type
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

// Function to check if $_POST data is available
function isPostDataAvailable()
{
    return !empty($_POST);
}

// Function to check if the "table" parameter is present in the URL
function isTableParameterAvailable()
{
    return isset($_GET['table']);
}

// Function to display an error message
function displayErrorMessage($message)
{
    echo "<p>$message</p>";
}
?>

<div class="container">
    <div class="mt-4">
        <?php
        // Check if the "table" parameter is available in the URL
        if (isTableParameterAvailable()) {
            $tableName = $_GET['table'];

            if (isPostDataAvailable()) {
                ?>
                <h2 class="mb-4">Modifica Record</h2>
                <form method="post" action="aggiorna.php?table=<?php echo $tableName; ?>">
                    <?php
                    // Iterate over the values in $_POST
                    foreach ($_POST as $key => $value) {
                        // Assuming you have the field type information, you can manually set it here
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
