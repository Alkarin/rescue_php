<?php

function atSearch() {
    echo "at search";
}

function searchPokemon($connection, $param, $resultArray){
    // Search for names
    $param = mysqli_real_escape_string($connection,$param);
    $query = "SELECT name FROM pokemon WHERE name LIKE '%{$param}%'";
    $result = mysqli_query($connection, $query);

    //echo "Result: <br>" . $result;
    while($row = mysqli_fetch_assoc($result)){
        foreach($row as $name => $value){
            //print "$name: $value <br>";
            array_push($resultArray,$value);
        }
    }
    searchPokemonType($connection, $param, $resultArray);
}

function searchPokemonType($connection, $param, $resultArray){
    $count = 0;
    // Search for types
    // If type match, grab parent_id and grab name
    $param = mysqli_real_escape_string($connection,$param);

    $query = "SELECT pokemon_id FROM pokemon_type WHERE type LIKE '%{$param}%'";

    $result = mysqli_query($connection, $query);

//    echo "Result Type: <br>";

    while($row = mysqli_fetch_assoc($result)){
        foreach($row as $pokemon_id => $id){
            //print "$id: $value\t";
            array_push($resultArray,selectPokemonByType($connection,$id));
        }
        $count++;
    }

    print_r($resultArray);
}

function selectPokemonByType($connection, $id) {
    //iterate through array, query for each id, and return result
    $query = "SELECT name FROM pokemon WHERE id={$id}";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){
        foreach($row as $name => $value){
            //print "$name: $value\t";
            return $value;
        }
    }
}
