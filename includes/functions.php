<?php

function test(){
    echo "test";
}

function parsePokemon($jsonIterator, $connection) {
    $count = 0;
    foreach ($jsonIterator as $key => $val) {
        if(is_string($key)){
            continue;
        }
        echo 'index: ' . $key . "<br>";

        foreach($val as $k1 => $v1) {
            // name or type
            if($k1 === 'name'){
                // Array of Name Values
                //echo "its a name<br>";

                // Add Pokemon type to DB
                echo $k1 . ": " . $v1 . "<br>";
                $nameInput = mysqli_real_escape_string($connection,$v1);
                $nameInput = ucfirst($nameInput);

                $query  = "INSERT INTO pokemon (";
                $query .= " id, name";
                $query .= ") VALUES (";
                $query .= " '{$count}','{$nameInput}'";
                $query .= ")";

                echo "Query: " . $query . "<br>";

                $result = mysqli_query($connection, $query);
                handleQueryResult($result);
                $count++;

            } else if ($k1 === 'types') {
                // Array of Types
                //echo "its a type<br>";
                foreach($v1 as $k2 => $v2) {
                    echo $k2 . ": " . $v2 . "<br>";
                    $currentId = $count - 1;

                    // Add each type to DB
                    $typeInput = mysqli_real_escape_string($connection,$v2);

                    $query  = "INSERT INTO pokemon_type (";
                    $query .= " pokemon_id, type";
                    $query .= ") VALUES (";
                    $query .= " '{$currentId}','{$typeInput}'";
                    $query .= ")";

                    $result = mysqli_query($connection, $query);
                    handleQueryResult($result);
                }
            }
        }
        echo "<br>";
    }
}

function handleQueryResult($result) {
    if($result){
        // Success
        echo "Success <br>";
    } else {
        // Failure
        echo "Failure <br>";
    }
}
