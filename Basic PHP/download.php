<?php
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; table.csv');
    readfile("table.csv");
?>