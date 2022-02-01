<?php

    $arr = array(15, 3, 8, 11, 7, 14, 10, 13, 12, 9, 2, 1);
    $count = count($arr);

//    for ($j = 0; $j < count($arr) - 1; $j++){
//        for ($i = 0; $i < count($arr) - $j - 1; $i++){
//            // если текущий элемент больше следующего
//            if ($arr[$i] > $arr[$i + 1]){
//                // меняем местами элементы
//                $var = $arr[$i + 1];
//                $arr[$i + 1] = $arr[$i];
//                $arr[$i] = $var;
//            }
//        }
//    }


//    $flag = true;
//
//    while ($flag) {
//        $flag = false;
//        for ($i=0; $i<$count-1; $i++) {
//            if ($arr[$i] > $arr[$i+1]) {
//                $var = $arr[$i];
//                $arr[$i] = $arr[$i+1];
//                $arr[$i+1] = $var;
//                $flag = true;
//            }
//        }
//    }


    for ($i=1; $i<$count; $i++) {
        $j = $i;
        while ($j>0 && $arr[$j] < $arr[$j-1]) {
            $val = $arr[$j];
            $arr[$j] = $arr[$j-1];
            $arr[$j-1] = $val;
            $j = $j-1;
        }
    }



    echo '<pre>';
    print_r($arr);
    echo '</pre>';

?>