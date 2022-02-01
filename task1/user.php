<?php

//    $user = "Кирилл";
//    $count = iconv_strlen($user);

//    if (($count % 2) == 0) {
//        echo "Girl!";
//    } else {
//        echo "Boy!";
//    }



    function userGender($name)
    {
        $name = mb_strtolower($name, 'UTF-8');
        $name = implode(array_unique(preg_split('//u', $name, null, PREG_SPLIT_NO_EMPTY)));
        $count = iconv_strlen($name);
        if (($count % 2) == 0) {
            echo "Girl!";
            print_r($name);
        } else {
            echo "Boy!";
            print_r($name);
        }
    }


    return userGender('Константин');


?>
