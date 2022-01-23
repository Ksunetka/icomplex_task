<?php
class FactoryAnimals {
    public static function animalExample($kingdom) {

        switch ($kingdom) {
            case 'Звери':
                $obj = new Beast();
                $obj->placeBeast('Lion', 4, 1);
                $obj->placeBeast('Tiger', 4, 1);
                $obj->kingdomBeast();
                $obj->takeBeast('Tiger');
                break;
            case 'Рыбы':
                $obj = new Fish();
                $obj->placeFish('Окунь', 1);
                $obj->placeFish('Щука', 1);
                $obj->kingdomFish();
                $obj->takeFish('Окунь');
                break;
            case 'Птицы':
                $obj = new Bird();
                $obj->placeBird('Чайка', 2, 1, 2);
                $obj->placeBird('Павлин', 2, 1, 2);
                $obj->kingdomBird();
                $obj->takeBird('Чайка');
                break;
        }

        return $obj;

    }

}

class ZooManager extends FactoryAnimals {
    public function getExampleBeast() {
        $beast = FactoryAnimals:: animalExample('Звери');

    }

    public function getExampleFish() {
        $fish = FactoryAnimals:: animalExample('Рыбы');
    }

    public function getExampleBird() {
        $bird = FactoryAnimals:: animalExample('Птицы');
    }
}

class ZooKeeper extends ZooManager {

    public function placeBeast() {

    }

    public function takeBeast() {

    }

    public function placeFish() {

    }

    public function takeFish() {

    }

    public function placeBird() {

    }

    public function takeBird() {

    }

    public function kingdomBeast() {

    }

    public function kingdomFish() {

    }

    public function kingdomBird() {

    }


}

class AllAnimals {

    public function placeBeast($name, $paw, $tail) {
        array_push($this->beasts, ['Имя' => $name, 'Лапы' => $paw, 'Хвост' => $tail]);
    }

    public function takeBeast($name) {
        $arrayKey = array_search($name, array_column($this->beasts, 'Имя'));
        if ($arrayKey!==false) {
            echo "Найдено животное: ".$this->beasts[$arrayKey]['Имя'].'<br>Лапы: '.$this->beasts[$arrayKey]['Лапы'].'<br>Хвост: '.$this->beasts[$arrayKey]['Хвост'].'<br>';
        } else {
            echo "Животное не найдено";
        }
    }

    public function placeFish($name, $tail) {
        array_push($this->fishes, ['Имя' => $name, 'Хвост' => $tail]);
    }

    public function takeFish($name) {
        $arrayKey = array_search($name, array_column($this->fishes, 'Имя'));
        if ($arrayKey!==false) {
            echo "Найдено животное: ".$this->fishes[$arrayKey]['Имя'].'<br>Хвост: '.$this->fishes[$arrayKey]['Хвост'].'<br>';
        } else {
            echo "Животное не найдено";
        }
    }

    public function placeBird($name, $paw, $tail, $wing) {
        array_push($this->birds, ['Имя' => $name, 'Лапы' => $paw, 'Хвост' => $tail, 'Крылья' => $wing]);
    }

    public function takeBird($name) {
        $arrayKey = array_search($name, array_column($this->birds, 'Имя'));
        if ($arrayKey!==false) {
            echo "Найдено животное: ".$this->birds[$arrayKey]['Имя'].'<br>Лапы: '.$this->birds[$arrayKey]['Лапы'].'<br>Хвост: '.$this->birds[$arrayKey]['Хвост'].'<br>Крылья: '.$this->birds[$arrayKey]['Крылья'].'<br>';
        } else {
            echo "Животное не найдено";
        }
    }

    public function kingdomBeast() {
        echo "<pre>";
        print_r($this->beasts);
        echo "</pre>";

    }

    public function kingdomFish() {
        echo "<pre>";
        print_r($this->fishes);
        echo "</pre>";
    }

    public function kingdomBird() {
        echo "<pre>";
        print_r($this->birds);
        echo "</pre>";
    }
 
}

class Animal extends AllAnimals {
    public $name;
}

class Beast extends AllAnimals {
    public $paw;
    public $tail;
    public $beasts = array();
}

class Fish extends AllAnimals {
    public $tail;
    public $fishes = array();
}

class Bird extends AllAnimals {
    public $tail;
    public $birds = array();
}


$manager = new ZooManager();
$manager->getExampleBeast();
$manager->getExampleFish();
$manager->getExampleBird();


