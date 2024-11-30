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
        "Glace" => ["faible" => "feu", "fort" => "sol"],
    ];


    public function __construct($pokemon1, $pokemon2)
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    public function startFight() {
        echo "Le combat entre {$this->pokemon1->getName()} et {$this->pokemon2->getName()} commence !<br><br>";
    
        flush();

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
        
        echo "{$attaquant->getName()} attaque avec {$attaqueChoisie->getName()} !<br>";
    
        if ($attaqueChoisie->isSpecial()) {
            $bonus = $this->calculerEffetDeType($attaquant->getType(), $defenseur->getType());
        } else {
            $bonus = 1.0;
        }
    
        $degats = $attaqueChoisie->getPower() * $bonus;
        $defenseur->recevoirDegats((int) $degats);
        
        echo "{$defenseur->getName()} a maintenant {$defenseur->getHP()} points de vie.<br><br>";
        flush();
    }
    
    

    private function calculerEffetDeType(string $typeAttaquant, string $typeDefenseur): float
    {
        if (isset(self::$relationsTypes[$typeAttaquant])) {
            $fort = self::$relationsTypes[$typeAttaquant]["fort"];
            $faible = self::$relationsTypes[$typeAttaquant]["faible"];
    
            if ($typeDefenseur === $fort) {
                echo "C'est super efficace !\n";
                return 1.5;
            }
    
            if ($typeDefenseur === $faible) {
                echo "Ce n'est pas très efficace...\n";
                return 0.5; 
            }
        }
        return 1.0;
    }

    public function determinerVainqueur(): void
    {
        if ($this->pokemon1->estKO()) {
            echo "{$this->pokemon1->getName()} est KO. {$this->pokemon2->getName()} remporte la victoire !\n";
        } elseif ($this->pokemon2->estKO()) {
            echo "{$this->pokemon2->getName()} est KO. {$this->pokemon1->getName()} remporte la victoire !\n";
        }
    }
}