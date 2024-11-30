<?php

require './class/Attack.php';
require './class/Pokemon.php';

$baseattack1 = new Attack ("Charge", 20, 0.95, false);
$baseattack2 = new Attack ("Vive-Attaque", 20, 1.00, false);
$baseattack3 = new Attack ("Coupe", 25, 0.90, false);

$specialATKFire = new Attack("Pied Brûleur", 45, 0.90, true);
$specialATKWater = new Attack("Hydrocanon", 55, 0.85, true);
$specialATKIce = new Attack("Laser Glace", 45, 1.00, true);
$specialATKPlant = new Attack("Fouet Lianes", 45, 1.00, true);
$specialATKElectric = new Attack("Tonnerre", 45, 1.00, true);
$specialATKGround = new Attack("Tir de Boue", 40, 1.00, true);

$Lippoutou = new Pokemon('Lippoutou', "Glace", 110, [$specialATKIce, $baseattack1, $baseattack2, $baseattack3]);
$Clamiral = new Pokemon("Clamiral", "Eau", 130, [$specialATKWater, $baseattack1, $baseattack2, $baseattack3]);
$Arcanin = new Pokemon("Arcanin", "Feu", 120, [$specialATKFire, $baseattack1, $baseattack2, $baseattack3]);
$Boustiflor = new Pokemon("Boustiflor", "Plante", 90, [$specialATKPlant, $baseattack1, $baseattack2, $baseattack3]);
$Voltali = new Pokemon("Voltali", "Electrique", 110, [$specialATKElectric, $baseattack1, $baseattack2, $baseattack3]);
$Limonde = new Pokemon("Limonde", "Sol", 40, [$specialATKGround, $baseattack1, $baseattack2, $baseattack3]);