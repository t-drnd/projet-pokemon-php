<?php

require_once './class/Pokemon.php';
require './class/Attack.php';
require './class/Combat.php';

$baseattack1 = new Attack ("Charge", 20, 0.95);
$baseattack2 = new Attack ("Vive-Attaque", 20, 1.00);
$baseattack3 = new Attack ("Coupe", 25, 0.90);

$specialATKFire = new Attack("Pied Brûleur", 45, 0.90);
$specialATKWater = new Attack("Hydrocanon", 55, 0.85);
$specialATKIce = new Attack("Laser Glace", 45, 1.00);
$specialATKPlant = new Attack("Fouet Lianes", 45, 1.00);
$specialATKElectric = new Attack("Tonnerre", 45, 1.00);
$specialATKGround = new Attack("Tir de Boue", 40, 1.00);

$lippoutou = new Pokemon("Lippoutou", "Glace", 110, [$specialATKIce, $baseattack1, $baseattack2, $baseattack3]);
$clamiral = new Pokemon("Clamiral", "Eau", 130, [$specialATKWater, $baseattack1, $baseattack2, $baseattack3]);
$arcanin = new Pokemon("Arcanin", "Feu", 120, [$specialATKFire, $baseattack1, $baseattack2, $baseattack3]);
$boustiflor = new Pokemon("Boustiflor", "Plante", 90, [$specialATKPlant, $baseattack1, $baseattack2, $baseattack3]);
$voltali = new Pokemon("Voltali", "Electrique", 110, [$specialATKElectric, $baseattack1, $baseattack2, $baseattack3]);
$limonde = new Pokemon("Limonde", "Sol", 40, [$specialATKGround, $baseattack1, $baseattack2, $baseattack3]);