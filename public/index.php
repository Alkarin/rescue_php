<?php require_once("../includes/db_connection.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php require_once("search.php") ?>


<?php
// SUPPRESS WARNINGS
error_reporting(E_ERROR | E_PARSE);

if(isset($_GET["search"])){
    $searchParam = $_GET["search"];
    //echo "received query: " . $searchParam . "<br>";

    // Find result to return to Angular App
    $resultArray = array();

    // http://localhost:8888/?search=Bulbasaur
    searchPokemon($connection,$searchParam,$resultArray);

} else {
    // Parse JSON
    $jsonRaw = file_get_contents('../data/pokemon.json');

    $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($jsonRaw, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST);

//    parsePokemon($jsonIterator, $connection);

}
?>


