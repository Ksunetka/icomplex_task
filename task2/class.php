<?php

    class MyParent
    {
        public $name;
        public $about;

        public function setName($name)
        {
            $this->name = $name;
        }

        public function setAbout($about)
        {
            $this->about = $about;
        }

        public function getName()
        {
            print_r('Меня зовут '.$this->name.'. ');
        }

        public function getAbout()
        {
            echo $this->about;
        }

    }

    class MyChild extends MyParent
    {
        public function getName()
        {
            parent::getName();
        }
    }

    class MyChild2 extends MyParent {
        public function getAbout()
        {
            parent::getAbout();
        }
    }

    $child = new MyChild();
    $child->setName('Ксения');
    $child->getName();

    $child2 = new MyChild2();
    $child2->setAbout('Я умею верстать сайты.');
    $child2->getAbout();


?>