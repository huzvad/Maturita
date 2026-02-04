<?php
session_start();

// musí být přihlášen
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$nazev = $_POST["nazev"];
$velikost = $_POST["velikost"];
$cena = (int)$_POST["cena"];

$item = [
    "nazev" => $nazev,
    "velikost" => $velikost,
    "cena" => $cena,
    "ks" => 1
];

// inicializace košíku
if (!isset($_SESSION["kosik"])) {
    $_SESSION["kosik"] = [];
}

$_SESSION["kosik"][] = $item;

header("Location: kosik.php");
exit;
