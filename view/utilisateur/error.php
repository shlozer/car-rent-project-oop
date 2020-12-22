
    <?php
        $l = null;
        if (isset($_GET['login'])){
            $l = rawurlencode (htmlspecialchars(($_GET['login'])));
        }
        echo 'L\' utilisateur '. $l .' n\'existe pas';
//      echo 'La voiture n\'existe pas';
    ?>
