<?php
session_start();

$pokemonImages = [
    "Limonde" => ["imagefront" => "https://img.pokemondb.net/sprites/black-white/anim/shiny/stunfisk.gif", "type" => "Sol", "imageback" => "https://img.pokemondb.net/sprites/black-white/anim/back-shiny/stunfisk.gif"],
    "Clamiral" => ["imagefront" => "https://img.pokemondb.net/sprites/black-white-2/anim/normal/samurott.gif", "type" => "Eau", "imageback" => "https://img.pokemondb.net/sprites/black-white/anim/back-normal/samurott.gif"],
    "Voltali" => ["imagefront" => "https://img.pokemondb.net/sprites/black-white/anim/normal/jolteon.gif", "type" => "Électrique", "imageback" => "https://img.pokemondb.net/sprites/black-white/anim/back-normal/jolteon.gif"],
    "Lippoutou" => ["imagefront" => "https://img.pokemondb.net/sprites/black-white/anim/normal/jynx.gif", "type" => "Glace", "imageback" => "https://img.pokemondb.net/sprites/black-white/anim/back-normal/jynx.gif"],
    "Boustiflor" => ["imagefront" => "https://img.pokemondb.net/sprites/black-white/anim/normal/weepinbell.gif", "type" => "Plante", "imageback" => "https://img.pokemondb.net/sprites/black-white/anim/back-normal/weepinbell.gif"],
    "Arcanin" => ["imagefront" => "https://img.pokemondb.net/sprites/black-white/anim/normal/arcanine.gif", "type" => "Feu", "imageback" => "https://img.pokemondb.net/sprites/black-white/anim/back-normal/arcanine.gif"]
];

require 'pokemonData.php';

require './class/Combat.php'; 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />    <link rel="stylesheet" href="./CSS/fightinterface.css">
    <title>Document</title>
</head>
<body>
<?php
    if (isset($_GET['pokemon']) && isset($_GET['adversaire'])) {
        $pokemonName = htmlspecialchars($_GET['pokemon']);
        $adversaireName = htmlspecialchars($_GET['adversaire']);

        if (array_key_exists($pokemonName, $pokemonImages) && array_key_exists($adversaireName, $pokemonImages)) {
            $imageURLpoke = $pokemonImages[$pokemonName]['imageback'];
            $imageURLadv = $pokemonImages[$adversaireName]['imagefront'];
            echo "
            <div class=\"fightdiv\">
                <div class=\"mypokemon\">
                <img src='$imageURLpoke' alt='$pokemonName' class='selectedpokemonimg poke1img'>
                </div>
                <div class=\"adversepokemon\">
                <img src='$imageURLadv' alt='$adversaireName' class='selectedpokemonimg poke2img'>
                </div>
            </div>";
            $_SESSION['pokemon1'] = $pokemonName;
            $_SESSION['pokemon2'] = $adversaireName;
            $_SESSION['tour'] = 1;
        } else {
            echo "<p>Un ou plusieurs Pokémon sont inconnus.</p>";
            exit;
        }
    } else {
        echo "<p>Paramètres manquants.</p>";
        exit;
    }


$pokemon1 = $_SESSION['pokemon1'];
$pokemon2 = $_SESSION['pokemon2'];

global $$pokemon1, $$pokemon2; 
$pokemon1Obj = $$pokemon1;
$pokemon2Obj = $$pokemon2; 

$combat = new Combat($pokemon1Obj, $pokemon2Obj);
$combat->startFight();
$combat->getFightDetail();
$fightDetails = json_encode($combat->fightdetail);

?>

<div class="scriptcontainer">
    <div id="fightDetailContainer">
        <p id="fightDetail">Cliquez sur le bouton pour commencer le combat.</p>
        <button id="nextStepButton"><i class="fa-solid fa-caret-down"></i></button>
    </div>
</div>

<script>
    let currentStep = 0;

    function showStep() {
        const fightDetailElement = document.getElementById('fightDetail');
        if (currentStep < fightDetails.length) {
            fightDetailElement.textContent = fightDetails[currentStep];
            currentStep++;
        } else {
            fightDetailElement.textContent = "Le combat est terminé !";

            const button = document.getElementById('nextStepButton');

            button.addEventListener('click', () => {
                window.location.href = "index.php";
            })
        }
    }

    document.getElementById('nextStepButton').addEventListener('click', showStep);
</script>
<script>
    const fightDetails = <?= $fightDetails; ?>;
</script>
</body>
</html>
