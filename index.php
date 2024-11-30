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
                        <button type="submit" name="pokemon" value="Limonde">
                            <li>
                                <img src="https://img.pokemondb.net/sprites/black-white/anim/shiny/stunfisk.gif" alt="Stunfisk">
                                Limonde
                            </li>
                        </button>
                        <button type="submit" name="pokemon" value="Clamiral">
                            <li>
                                <img src="https://img.pokemondb.net/sprites/black-white-2/anim/normal/samurott.gif" alt="Samurott">
                                Clamiral
                            </li>
                        </button>
                        <button type="submit" name="pokemon" value="Voltali">
                            <li>
                                <img src="https://img.pokemondb.net/sprites/black-white/anim/normal/jolteon.gif" alt="Jolteon">
                                Voltali
                            </li>
                        </button>
                        <button type="submit" name="pokemon" value="Lippoutou">
                            <li> 
                                <img src="https://img.pokemondb.net/sprites/black-white/anim/normal/jynx.gif" alt="Jynx">
                                Lippoutou
                            </li>
                        </button>
                        <button type="submit" name="pokemon" value="Boustiflor">
                            <li> 
                                <img src="https://img.pokemondb.net/sprites/black-white/anim/normal/weepinbell.gif" alt="Weepinbell">
                                Boustiflor
                            </li>
                        </button>
                        <button type="submit" name="pokemon" value="Arcanin">
                            <li>
                                <img src="https://img.pokemondb.net/sprites/black-white/anim/normal/arcanine.gif" alt="Arcanine"> 
                                Arcanin
                            </li>
                        </button>
                    </ul>
                </form>
            </div> 
        </div>
    </div>
</body>
</html>

<?php

require_once './class/Pokemon.php';
require './class/Attack.php';
require './class/Combat.php';
require 'pokemonData.php';