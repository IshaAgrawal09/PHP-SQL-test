<?php
    session_start();
    session_unset();
    session_destroy();

    echo "<a href='Prod_add.php'>Back to home</a>";
