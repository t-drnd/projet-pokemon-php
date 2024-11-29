<?php

class Combat {
    private $pokemon1;
    private $pokemon2;

    private static array $relationsTypes = [
        "Feu" => ["faible" => "Eau", "fort" => "Plante"],
        "Eau" => ["faible" => "Électrique", "fort" => "Feu"],
        "Plante" => ["faible" => "Feu", "fort" => "Eau"],
        "Électrique" => ["faible" => "Sol", "fort" => "Eau"],
        "Sol" => ["faible" => "Plante", "fort" => "Électrique"],
        "Glace" => ["faible" => "feu", "fort" => "sol"],
    ];

    public function __construct(object $pokemon1, object $pokemon2)
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    public function startFight() {
        echo "Le combat entre {$this->pokemon1->getName()} et {$this->pokemon2->getName()} commence !\n\n";

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

        $bonus = $this->calculerEffetDeType($attaquant->getType(), $defenseur->getType());

        echo "{$attaquant->getName()} attaque avec {$attaqueChoisie->getName()} !\n";

        $degats = $attaqueChoisie->getPower() * $bonus;
        $defenseur->recevoirDegats((int) $degats);

        echo "{$defenseur->getName()} a maintenant {$defenseur->getHP()} points de vie.\n\n";
    }

    private function calculerEffetDeType(string $typeAttaquant, string $typeDefenseur): float
{
    if (isset(self::$relationsTypes[$typeAttaquant])) {
        $fort = self::$relationsTypes[$typeAttaquant]["fort"];
        $faible = self::$relationsTypes[$typeAttaquant]["faible"];

        if (is_array($fort) && in_array($typeDefenseur, $fort)) {
            echo "C'est super efficace !\n";
            return 1.5;
        } elseif ($typeDefenseur === $faible) {
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