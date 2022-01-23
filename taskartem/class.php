<?php

    class Output
    {
        public $output;

        public function __construct ($output) {
            $this->output = $output;
        }

        public function outputDisplay()
        {
            echo 'Это вывод на '.$this->output.'<br>';
        }

        public function outputPrinter()
        {
            print_r('Это вывод на '.$this->output);
        }

    }

    class Display extends Output
    {

    }

    class Printer extends Output {

    }

    $display = new Display('экран');
    $display->outputDisplay();

    $printer = new Printer('принтер');
    $printer->outputPrinter();


?>