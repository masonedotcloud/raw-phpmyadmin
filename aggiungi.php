<?php include_once('head.php') ?>

<body>
    <?php include_once('header.php') ?>
    <div class="container">
        <div class="mt-4">
            <?php
            // Verifica se il parametro 'table' è presente nell'URL
            if (isset($_GET['table'])) {
                $tableName = $_GET['table'];
            ?>
                <h2 class="mb-4">Aggiunta record nella tabella: <?php echo $tableName; ?></h2>
                <form action="inserisci.php?table=<?php echo $tableName; ?>" method="post">
                    <?php
                    // Itera sui valori presenti in $_POST
                    foreach ($_POST as $key => $value) {
                        // Ignora il campo "table" nell'array $_POST
                        if ($key === 'table') {
                            continue;
                        }
                    ?>
                        <div class="mb-3">
                            <label for="<?php echo $key; ?>"><?php echo $key; ?>:</label>
                            <input type="text" class="form-control" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
                        </div>
                    <?php
                    }
                    ?>
                    <button type="submit" class="btn btn-success">Aggiungi record</button>
                </form>
            <?php
            } else {
            ?>
                <p>Parametro 'table' mancante nell'URL.</p>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
