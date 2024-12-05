<?php

require 'pokemonData.php';

$pokemonList = [
    $Lippoutou,
    $Clamiral,
    $Arcanin,
    $Boustiflor,
    $Voltali,
    $Limonde
];

$pokemonImages = [
    "Limonde" => ["image" => "https://img.pokemondb.net/sprites/black-white/anim/shiny/stunfisk.gif", "type" => "Sol"],
    "Clamiral" => ["image" => "https://img.pokemondb.net/sprites/black-white-2/anim/normal/samurott.gif", "type" => "Eau"],
    "Voltali" => ["image" => "https://img.pokemondb.net/sprites/black-white/anim/normal/jolteon.gif", "type" => "Électrique"],
    "Lippoutou" => ["image" => "https://img.pokemondb.net/sprites/black-white/anim/normal/jynx.gif", "type" => "Glace"],
    "Boustiflor" => ["image" => "https://img.pokemondb.net/sprites/black-white/anim/normal/weepinbell.gif", "type" => "Plante"],
    "Arcanin" => ["image" => "https://img.pokemondb.net/sprites/black-white/anim/normal/arcanine.gif", "type" => "Feu"]
];

$colors = [
    "Lippoutou" => "lippoutou-bg",
    "Clamiral" => "clamiral-bg",
    "Voltali" => "voltali-bg",
    "Boustiflor" => "boustiflor-bg",
    "Arcanin" => "arcanin-bg",
    "Limonde" => "limonde-bg",
];


require_once './class/Pokemon.php';
require './class/Combat.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Combat Pokemon</title>
</head>
<body>
    <div class="main">
        <div class="liste_pokemon">
            <h1>Choisissez votre Pokemon:</h1>
            <div class="pokemon_container">
            <form action="maininterface.php" method="get">
            <?php foreach ($pokemonList as $pokemon): ?>
                    <button type="submit" name="pokemon" value="<?= $pokemon->getName(); ?>">
                        <?php 
                            $extraClass = $colors[$pokemon->getName()] ?? "";
                        ?>
                        <li class="<?= $extraClass; ?>" id="pokemonblock">
                            <div class="mainblock">
                                <div class="leftblock">
                                    <img src="<?= $pokemonImages[$pokemon->getName()]['image']; ?>" alt="<?= $pokemon->getName(); ?>">
                                </div>
                                <div class="rightblock">
                                    <p><?= $pokemon->getName(); ?></p>
                                    <br>
                                    <p>Type : <?= $pokemon->getType(); ?></p>
                                    <br>
                                    <p>HP : <?= $pokemon->getHP(); ?></p>
                                    <br>
                                </div>
                            </div>
                            
                            <h4 class="titleattaques">Attaques :</h4>
                            <ul>
                                <?php foreach ($pokemon->getAttaques() as $attack): ?>
                                    <div class="attackblock"><span><?= $attack->getName(); ?></span><br> (Puissance: <?= $attack->getPower(); ?>, Précision: <?= $attack->getPrecision() * 100; ?>%)</div>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </button>
                
            <?php endforeach; ?>
            </form>
            </div> 
        </div>
    </div>
</body>
</html>

