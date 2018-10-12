<?php require_once("../includes/db_connection.php") ?>
<?php require_once("../includes/functions.php") ?>

<?php
// SUPPRESS WARNINGS
error_reporting(E_ERROR | E_PARSE);

//read the json file contents
$jsonRaw = file_get_contents('../data/pokemon.json');

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($jsonRaw, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

//parsePokemon($jsonIterator, $connection);
//test();

?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
    <div id="navigation">
        <br>
        <h2>Nav</h2>
        <br>
    </div>
    <div id="page">

        <h2>Menu Name</h2>
        <br>

    </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>