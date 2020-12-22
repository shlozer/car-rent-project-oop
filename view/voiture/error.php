
    <?php
        $i = null;
        if (isset($_GET['immat'])){
            $i = rawurlencode (htmlspecialchars(($_GET['immat'])));
        }
        echo 'La voiture '. $i .' n\'existe pas';
//      echo 'La voiture n\'existe pas';
    ?>
