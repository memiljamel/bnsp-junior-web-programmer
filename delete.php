<?php

require_once "./function.php";

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
        <script>
            alert('Data deleted successfully!');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data deleted failed!');
            document.location.href = 'index.php';
        </script>
    ";
}