<?php
if (isset($_SESSION['pesan'])) {
    echo "<p>" . $_SESSION['pesan'] . "</p>";
    unset($_SESSION['pesan']);
}
?>