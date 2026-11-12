<?php

declare(strict_types=1);

class Compute
{
    private int|float $result = 0;

    public static int $modulo = 0;

    public function add(int $x, int $y): void
    {
        $this->result = $x + $y;
        self::$modulo = 3;
    }

    public function substract(int $x, int $y): void
    {
        $this->result = $x - $y;
    }

    public function divide(int $x, int $y): void
    {
        $this->result = $x / $y;
    }

    public function facto(int $x): void
    {
        $facto = $x;
        while ($x > 1) {
            $x -= 1;
            $facto = $facto * $x;
        }

        $this->result = $facto;
    }

    public function squareRoot(int $x): void
    {
        $this->result = sqrt($x);
    }

    public function getResult(): int|float
    {
        return $this->result;
    }
}

$compute = new Compute();//instanciation class
$compute->add(4, 5);//public function add
echo "Add 4, 5 = " . $compute->getResult() .  "<br>";

$compute->substract(4, 5);
echo "Substract 4, 5 = " . $compute->getResult() .  "<br>";

$compute->divide(4, 5);
echo "Divide 4, 5 = " . $compute->getResult() .  "<br>";

$compute->facto(5);
echo "Facto 5 = " . $compute->getResult() .   "<br>";

$compute->squareRoot(4);
echo "Square root 4 = " . $compute->getResult() .   "<br>";

//Créer classe Person, priv. firstname, lastname, address, age
//Créer méthode public pour afficher ces propriétés
//instancier la classe Person
//appeler ses méthodes que vous avez créer
