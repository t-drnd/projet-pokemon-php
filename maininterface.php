<?php

$pokemonList = [
    "Limonde",
    "Clamiral",
    "Voltali",
    "Lippoutou",
    "Boustiflor",
    "Arcanin"
];

$pokemonImages = [
    "Limonde" => "https://img.pokemondb.net/sprites/black-white/anim/shiny/stunfisk.gif",
    "Clamiral" => "https://img.pokemondb.net/sprites/black-white-2/anim/normal/samurott.gif",
    "Voltali" => "https://img.pokemondb.net/sprites/black-white/anim/normal/jolteon.gif",
    "Lippoutou" => "https://img.pokemondb.net/sprites/black-white/anim/normal/jynx.gif",
    "Boustiflor" => "https://img.pokemondb.net/sprites/black-white/anim/normal/weepinbell.gif",
    "Arcanin" => "https://img.pokemondb.net/sprites/black-white/anim/normal/arcanine.gif"
];

require 'pokemonData.php';
require_once './class/Combat.php';

$randomKey = array_rand($pokemonList);
$randomPokemon = $pokemonList[$randomKey];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/maininterface.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <?php
            if (isset($_GET['pokemon'])) {
                $pokemon = htmlspecialchars($_GET['pokemon']);

                if (array_key_exists($pokemon, $pokemonImages)) {
                    $imageURL = $pokemonImages[$pokemon];
                    echo "<p class='selectedpokemon'>Vous avez sélectionné : $pokemon</p>";
                    echo "<img src='$imageURL' alt='$pokemon' class='selectedpokemonimg'>";
                } else {
                    echo "<p>Vous avez sélectionné un Pokémon inconnu.</p>";
                }
            } else {
                header("Location: index.php");
            }
        ?>
        <div class="mainbuttons">
            <form class="changepokemondiv">
                <button onclick="window.location.href='index.php';" class="switchp"><img src="./img/iconpokeball.png" alt=""></button>
                <h2>Changer de Pokemon</h2>
            </form>
            <form class="findfightdiv" action="fightinterface.php " method="get">
                <input type="hidden" name="pokemon" value="<?php echo $pokemon; ?>">
                <button class="findfight" name="adversaire" value="<?php echo $randomPokemon; ?>"><img src="./img/iconpokemonfightwhite.png" alt=""></button>
                <h2>Trouver un combat</h2>
            </form>
        </div>
        <div class="healbuttondiv">
            <button class="healbutton">Je soigne mon Pokémon</button>
        </div>
    </div>
    
</body>
</html>