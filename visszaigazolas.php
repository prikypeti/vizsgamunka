<?php

require_once './index.php';

$rendeltpizza = $_POST['pizza_fajta'];
$vevo = $_POST['name'];
$cim = $_POST['cim'];
$telefonszam = $_POST['telszam'];
$emailcim = $_POST['email'];
$extra = $_POST['megjegyzes'];

echo "Köszönjük $vevo a megrendelést rögzítettük!";
echo "<br>";
echo "A megrendelésed a megadott $cim cimre szállitjuk";

