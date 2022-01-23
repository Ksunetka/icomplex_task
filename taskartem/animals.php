<?php

class Animal {
    public $name;
    public $paw;
    public $tail;
    public $wing;
}

class Beasts extends Animal {
    public $kingdom = 'Звери';
    public $paw;
    public $tail;


    public function getBeast ($name, $paw, $tail) {
        echo 'Животное '.$name. 'относится к царству '.$this->kingdom.'. У него есть '.$paw.' лапы и '.$tail.' хвост. <br>';
    }


}

class Fish extends Animal {
    public $kingdom = 'Рыбы';
    public $tail;

    public function getFish ($name, $tail) {
        echo 'Животное '.$name.' относится к царству '.$this->kingdom.'. У него есть '.$tail.' хвост. <br>';
    }

}

class Bird extends Animal {
    public $kingdom = 'Птицы';
    public $paw;
    public $tail;
    public $wing;



    public function getBird ($name, $paw, $tail, $wing) {
        echo 'Животное '.$name.' относится к царству '.$this->kingdom.'. У него есть '.$paw.' лапы, '.$tail.' хвост и '.$wing.' крыла. <br>';
    }

}


 $beast = new Beasts();
 $beast->getBeast('Лев', 4, 1);

 $beast->setBeast('Звери', 4, 1);

//$fish = new Fish();
//$fish->getFish('Окунь',1);
//
//$bird = new Bird();
//$bird->getBird('Аист', 2, 1, 2);


?>
