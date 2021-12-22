<?php

//    $user = "Кирилл";
//    $count = iconv_strlen($user);

//    if (($count % 2) == 0) {
//        echo "Girl!";
//    } else {
//        echo "Boy!";
//    }



    function userGender($user)
    {
        $count = iconv_strlen($user);
        if (($count % 2) == 0) {
            echo "Girl!";
        } else {
            echo "Boy!";
        }
    }


    return userGender("Полина");

?>
