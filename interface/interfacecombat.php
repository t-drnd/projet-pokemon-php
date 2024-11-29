<?php

interface Combattant {
    public function startFight(Pokemon $adversaire): void;
    public function capaciteSpeciale(Pokemon $adversaire): void;
}

