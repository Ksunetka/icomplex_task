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
        $name = join(array_unique(preg_split('//u', $name)));
        $count = iconv_strlen($name);
        if (($count % 2) == 0) {
            echo "Girl!";
            print_r($name);
        } else {
            echo "Boy!";
            print_r($name);
        }
    }


    return userGender('Екатерина');


?>
