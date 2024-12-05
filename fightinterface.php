<?php
session_start(); // Démarre la session pour garder l'état entre les tours

$pokemonImages = [
    "Limonde" => ["image" => "https://img.pokemondb.net/sprites/black-white/anim/shiny/stunfisk.gif", "type" => "Sol"],
    "Clamiral" => ["image" => "https://img.pokemondb.net/sprites/black-white-2/anim/normal/samurott.gif", "type" => "Eau"],
    "Voltali" => ["image" => "https://img.pokemondb.net/sprites/black-white/anim/normal/jolteon.gif", "type" => "Électrique"],
    "Lippoutou" => ["image" => "https://img.pokemondb.net/sprites/black-white/anim/normal/jynx.gif", "type" => "Glace"],
    "Boustiflor" => ["image" => "https://img.pokemondb.net/sprites/black-white/anim/normal/weepinbell.gif", "type" => "Plante"],
    "Arcanin" => ["image" => "https://img.pokemondb.net/sprites/black-white/anim/normal/arcanine.gif", "type" => "Feu"]
];

require 'pokemonData.php'; // Assure que ce fichier inclut les classes nécessaires

require './class/Combat.php'; // Inclus la classe Combat
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/fightinterface.css">
    <title>Document</title>
</head>
<body>
<?php
if (!isset($_SESSION['pokemon1']) || !isset($_SESSION['pokemon2'])) {
    if (isset($_GET['pokemon']) && isset($_GET['adversaire'])) {
        $pokemonName = htmlspecialchars($_GET['pokemon']);
        $adversaireName = htmlspecialchars($_GET['adversaire']);

        // Vérifie si les Pokémon existent dans le tableau pokemonImages
        if (array_key_exists($pokemonName, $pokemonImages) && array_key_exists($adversaireName, $pokemonImages)) {
            $imageURLpoke = $pokemonImages[$pokemonName]['image'];
            $imageURLadv = $pokemonImages[$adversaireName]['image'];
            echo "
            <div class=\"fightdiv\">
                <div class=\"mypokemon\">
                <p class='selectedpokemon'>Votre pokémon : $pokemonName</p>
                <img src='$imageURLpoke' alt='$pokemonName' class='selectedpokemonimg'>
                </div>
                <img class=\"pokeball\" src=\"./img/iconpokeball.png\" alt=\"icone pokeball\">
                <div class=\"adversepokemon\">
                <p class='pokemonadverse'>Votre adversaire: $adversaireName</p>
                <img src='$imageURLadv' alt='$adversaireName' class='selectedpokemonimg'>
                </div>
            </div>";
            $_SESSION['pokemon1'] = $pokemonName;
            $_SESSION['pokemon2'] = $adversaireName;
            $_SESSION['tour'] = 1; // Initialiser le tour à 1
        } else {
            echo "<p>Un ou plusieurs Pokémon sont inconnus.</p>";
            exit;
        }
    } else {
        echo "<p>Paramètres manquants.</p>";
        exit;
    }
}

$pokemon1 = $_SESSION['pokemon1'];
$pokemon2 = $_SESSION['pokemon2'];

// Récupérer directement les objets Pokémon à partir des variables globales
// Par exemple, $Lippoutou, $Clamiral, etc. doivent être définis dans pokemonData.php
global $$pokemon1, $$pokemon2;  // Permet d'utiliser le nom du Pokémon dans la session comme variable
$pokemon1Obj = $$pokemon1;  // Récupère l'objet Pokémon de la variable correspondante
$pokemon2Obj = $$pokemon2;  // Idem pour l'adversaire

// Créer une instance de Combat avec les objets Pokémon
$combat = new Combat($pokemon1Obj, $pokemon2Obj);

// Vérifier si le combat est en cours
if ($_SESSION['tour'] <= 1 && !$pokemon1Obj->estKO() && !$pokemon2Obj->estKO()) {
    // Démarrer le combat
    $combat->startFight();
    $_SESSION['tour']++;
    echo "<br>";
    echo "<br>";
    echo "
    <div class=\"buttoncontainer\">
        <button onclick=\"window.location.href='fightinterface.php'\" class=\"buttonstyle1\">Avancer</button>
    </div>";
    exit;
} else {
    session_unset();
    session_destroy();
    echo "<p>Le combat est terminé !</p>";
    echo "<br>";
    echo "<div class=\"buttoncontainer\">
            <button onclick=\"window.location.href='./index.php'\" class=\"buttonstyle2\">Le combat est terminé, cliquez ici pour revenir à l'accueil</button>
        </div>";
}
?>
</body>
</html>
