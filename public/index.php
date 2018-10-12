<?php require_once("../includes/db_connection.php") ?>
<?php require_once("../includes/functions.php") ?>

<?php
// SUPPRESS WARNINGS
error_reporting(E_ERROR | E_PARSE);



if(isset($_GET["search"])){
    $searchQuery = $_GET["search"];

    echo "recieved query: " . $searchQuery;

} else {
    // Parse JSON

    //read the json file contents
    $jsonRaw = file_get_contents('../data/pokemon.json');

    $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($jsonRaw, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST);

//parsePokemon($jsonIterator, $connection);

}






?>


