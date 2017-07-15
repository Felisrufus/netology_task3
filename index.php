<?php
$array = [
    "Africa" => ["Mammuthus columbi", "Addax nasomaculatus", "Perameles nasuta", "Choeropsis liberiensis"],
    "Europe" => ["Protoxerus stangeri", "Vombatus hirsutus", "Desmana moschata"],
    "Asia" => ["Panthera uncia", "Eutamias sibiricus", "Mustela erminea"],
    "South America" => ["Papio cynocephalus", "Meles meles", "Castor canadensis", "Antilocapra americana"],
];
$animalFirstParts = [];
$animalSecondParts = [];
$arrayAnimals = [];

foreach ($array as $countryName => $animalArray) {
    foreach ($animalArray as $animalName) {
        $animalPart = explode(" ", $animalName);
        if (count($animalPart) == 2){
            $animalFirstParts[] = $animalPart[0];
            $animalSecondParts[] = $animalPart[1];
        }
    }
}

shuffle($animalSecondParts);
shuffle($animalFirstParts);
$newAnimal = [];

foreach ($animalFirstParts as $key => $value) {
    $newAnimal[] = $value . ' ' . $animalSecondParts[$key];
}

foreach($array as $countryName => $animalArray) {
    echo "<h2>$countryName</h2>";
    $animalCountry = [];
    foreach ($animalArray as $animalName) {
        $animalPart = explode (" ", $animalName);
        if (count($animalPart) == 2) {
            foreach($newAnimal as $fantasticAnimal){
               if (strpos($fantasticAnimal, $animalPart[0]) === 0){
                   $animalCountry[] = $fantasticAnimal;
               }
            }
        }
    }
    echo implode(', ', $animalCountry). '.';
}

?>