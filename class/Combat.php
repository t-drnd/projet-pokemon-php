<?php

class Combat {
    private $pokemon1;
    private $pokemon2;

    private static array $relationsTypes = [
        "Feu" => ["faible" => "Eau", "fort" => "Plante"],
        "Eau" => ["faible" => "Electrique", "fort" => "Feu"],
        "Plante" => ["faible" => "Feu", "fort" => "Eau"],
        "Electrique" => ["faible" => "Sol", "fort" => "Eau"],
        "Sol" => ["faible" => "Plante", "fort" => "Electrique"],
        "Glace" => ["faible" => "Feu", "fort" => "Sol"],
    ];

    public array $fightdetail = [];

    public array $PVdetail = [];


    public function __construct($pokemon1, $pokemon2, array $fightdetail = [], array $PVdetail = [])
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
        $this->fightdetail = $fightdetail;
        $this->PVdetail = $PVdetail;
    }

    public function setFightDetail(string $value) {
        $this->fightdetail[] = $value;
        return $this;
    }

    public function getFightDetail(): array {
        return $this->fightdetail;
    }
    public function setPVdetail(string $value) {
        $this->PVdetail[] = $value;
        return $this;
    }

    public function getPVdetail(): array {
        return $this->PVdetail;
    }

    public function startFight() {
        while (!$this->pokemon1->estKO() && !$this->pokemon2->estKO()) {
            $this->tourDeCombat($this->pokemon1, $this->pokemon2);
            if ($this->pokemon2->estKO()) break;
    
            $this->tourDeCombat($this->pokemon2, $this->pokemon1);
        }
    
        $this->determinerVainqueur();
    }
    
    public function tourDeCombat(Pokemon $attaquant, Pokemon $defenseur): void
    {
        $attaques = $attaquant->getAttaques();
        $attaqueChoisie = $attaques[array_rand($attaques)];
        
        $this->setFightDetail("{$attaquant->getName()} attaque avec {$attaqueChoisie->getName()} !");
    
        if ($attaqueChoisie->isSpecial()) {
            $bonus = $this->calculerEffetDeType($attaquant->getType(), $defenseur->getType());
        } else {
            $bonus = 1.0;
        }
    
        $degats = $attaqueChoisie->getPower() * $bonus;
        $defenseur->recevoirDegats((int) $degats);
        $this->setPVdetail($defenseur->getHP());
        $this->setFightDetail("{$defenseur->getName()} reçoit $degats dégâts.");

         $this->setFightDetail("{$defenseur->getName()} a maintenant {$defenseur->getHP()} points de vie.");
        }
    
    

    private function calculerEffetDeType(string $typeAttaquant, string $typeDefenseur): float
    {
        if (isset(self::$relationsTypes[$typeAttaquant])) {
            $fort = self::$relationsTypes[$typeAttaquant]["fort"];
            $faible = self::$relationsTypes[$typeAttaquant]["faible"];
    
            if ($typeDefenseur === $fort) {
                $this->setFightDetail("C'est super efficace !");
                return 2;
            }
    
            if ($typeDefenseur === $faible) {
                $this->setFightDetail("Ce n'est pas très efficace...");
                return 0.5; 
            }
        }
        return 1.0;
    }

    public function determinerVainqueur(): void
    {
        if ($this->pokemon1->estKO()) {
            $this->setFightDetail("{$this->pokemon1->getName()} est KO. {$this->pokemon2->getName()} remporte la victoire !");
        } elseif ($this->pokemon2->estKO()) {
            $this->setFightDetail("{$this->pokemon2->getName()} est KO. {$this->pokemon1->getName()} remporte la victoire !");
        }
    }
}