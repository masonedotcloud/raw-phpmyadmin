<?php include_once('head.php') ?>

<body>
    <?php include_once('header.php') ?>
    <div class="container">
        <div class="mt-4">
            <?php
            $tableName = $_GET['table'];
            if (isset($tableName)) {
            ?>
                <h2 class="mb-4">Aggiunta record nella tabella: <?php echo $tableName; ?></h2>
                <form action="inserisci.php?table=<?php echo $tableName; ?>" method="post">
                    <?php
                    foreach ($_POST as $key => $value) {
                        // Ignora il campo "table" nell'array $_POST
                    
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
