<?php

    $string = ["яблоко", "апельсин", "молоко", "хлеб", "салфетки", "шоколад"];
//    $i = 0;
    $count = count($string);
    $subString = "око";
    $a = [];
    $b = [];

    foreach($string as $value) {
        if (stripos($value, $subString) == true) {
            array_push($a, $value);
        } else {
            array_push($b, $value);
        }
    }


//        for ($i = 0; $i < $count; $i++) {
//            if (stripos($string[$i], $subString) == true) {
//                array_push($a, $string[$i]);
//            } else {
//                array_push($b, $string[$i]);
//            }
//        }

//        while ($i < $count) {
//            if (stripos($string[$i], $subString) == true) {
//                $a[] = $string[$i];
//            } else {
//                $b[] = $string[$i];
//            }
//            $i++;
//        }

//    sort($a);
//    sort($b);

//    var_dump($a);
//    var_dump($b);

    echo '<pre>';
    print_r($a);
    print_r($b);
    echo '</pre>';





?>