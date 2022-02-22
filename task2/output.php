<?php

//    class Output
//    {
//        public $output;
//
//        public function __construct ($output) {
//            $this->output = $output;
//        }
//        public function output()
//        {
//            echo 'Вывод на '.$this->output.'<br>';
//        }
//    }
//
//    class Display extends Output
//    {
//        public $output;
//        public function __construct($output)
//        {
//            parent::__construct($output);
//        }
//    }
//
//    class Printer extends Output {
//        public $output;
//        public function __construct($output)
//        {
//            parent::__construct($output);
//
//        }
//    }
//
//    $display = new Display('экран');
//    $display->output();
//    $printer = new Printer('принтер');
//    $printer->output();

class Output
{
    public $output;

    public function output()
    {
        echo 'Вывод на '.$this->output.'<br>';
    }
}

class Display extends Output
{
    public $output = "экран";
}

class Printer extends Output {
    public $output = "принтер";
}

$display = new Display();
$printer = new Printer();

?>