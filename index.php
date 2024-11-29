<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Combat Pokemon</title>
</head>
<body>
    <div class="liste_pokemon">
        <ul>
            <li><a href="https://pokemondb.net/pokedex/stunfisk"><img src="https://img.pokemondb.net/sprites/black-white/anim/shiny/stunfisk.gif" alt="Stunfisk"></a>Limonde</li>
            <li><a href="https://pokemondb.net/pokedex/samurott"><img src="https://img.pokemondb.net/sprites/black-white-2/anim/normal/samurott.gif" alt="Samurott"></a>Clamiral</li>
            <li><a href="https://pokemondb.net/pokedex/jolteon"><img src="https://img.pokemondb.net/sprites/black-white/anim/normal/jolteon.gif" alt="Jolteon"></a>Voltali</li>
            <li><a href="https://pokemondb.net/pokedex/jynx"><img src="https://img.pokemondb.net/sprites/black-white/anim/normal/jynx.gif" alt="Jynx"></a>Lippoutou</li>
            <li><a href="https://pokemondb.net/pokedex/weepinbell"><img src="https://img.pokemondb.net/sprites/black-white/anim/normal/weepinbell.gif" alt="Weepinbell"></a>Boustiflor</li>
            <li><a href="https://pokemondb.net/pokedex/arcanine"><img src="https://img.pokemondb.net/sprites/black-white/anim/normal/arcanine.gif" alt="Arcanine"></a>Arcanin</li>
        </ul>
    </div>
</body>
</html>

<?php

require_once './class/Pokemon.php';
require_once './class/Attaque.php';

$baseattack1 = new Attack ("Charge", 20, 0.95);
$baseattack2 = new Attack ("Vive-Attaque", 20, 1.00);
$baseattack3 = new Attack ("Coupe", 25, 0.90);

$specialATKFire = new Attack("Pied Brûleur", 45, 0.90);
$specialATKWater = new Attack("Hydrocanon", 55, 0.85);
$specialATKIce = new Attack("Laser Glace", 45, 1.00);
$specialATKPlant = new Attack("Fouet Lianes", 45, 1.00);
$specialATKElectric = new Attack("Tonnerre", 45, 1.00);
$specialATKGround = new Attack("Tir de Boue", 40, 1.00);

$lippoutou = new Pokemon("Lippoutou", "Glace", 110);
$clamiral = new Pokemon("Clamiral", "Eau", 130);
$arcanin = new Pokemon("Arcanin", "Feu", 120);
$boustiflor = new Pokemon("Boustiflor", "Plante", 90);
$voltali = new Pokemon("Voltali", "Electrique", 110);
$limonde = new Pokemon("Limonde", "Sol", 40);

foreach ([$baseattack1, $baseattack2, $baseattack3] as $attaque) {
    $lippoutou->ajouterAttaque($attaque);
    $clamiral->ajouterAttaque($attaque);
    $arcanin->ajouterAttaque($attaque);
    $boustiflor->ajouterAttaque($attaque);
    $voltali->ajouterAttaque($attaque);
    $limonde->ajouterAttaque($attaque);
}