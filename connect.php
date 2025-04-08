<?php
$connect = mysqli_connect('localhost', 'root', '', 'portfolio');

if ($connect) {
    echo '';
} else {
    echo'not connected';
}
?>