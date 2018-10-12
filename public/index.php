<?php require_once("../includes/db_connection.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php require_once("search.php") ?>

<?php
// CORS ACCEPTANCE
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// SUPPRESS WARNINGS
error_reporting(E_ERROR | E_PARSE);

if(isset($_GET["search"])){
    $searchParam = $_GET["search"];
    //echo "received query: " . $searchParam . "<br>";

    // Find result to return to Angular App
    $resultArray = array();

    if($searchParam === ""){

        $jsonNoResults = "No Results";
        $jsonNoResults = json_encode($jsonNoResults);
        print_r($jsonNoResults);

    } else {
        // search for Pokemon
        searchPokemon($connection,$searchParam,$resultArray);
    }


} else {
    // Parse JSON
    $jsonRaw = file_get_contents('../data/pokemon.json');

    $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($jsonRaw, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST);

    parsePokemon($jsonIterator, $connection);
}
?>


