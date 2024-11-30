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