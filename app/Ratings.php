<?php

use App\Lawyer;

function LawyerRating($id){
    $law = Lawyer::findOrFail($id);
    $avg = $law->ratings->avg('ratings');
    $main = (int) $avg;
    $last = 5;
    $star = 0;
    $mid = 0;

    $string = "";

    if($main < $avg){
        $star = $main;
        $mid++;
    }else{
        $star = $main;
    }

    while($star > 0){
        $string .= '<li><i class="fa fa-star"></i></li>';
        $star--;
        $last--;
    }

    if($mid == 1){
        $string .= '<li><i class="fa fa-star-half-o"></i></li>';
        $last--;
    }

    while($last > 0){
        $string .= '<li><i class="fa fa-star-o"></i></li>';
        $last--;
    }
    return $string;
}

function SingleRating($id){
    $main = (int) $id;
    $last = 5;
    $star = 0;
    $mid = 0;

    $string = "";

    if($main < $id){
        $star = $main;
        $mid++;
    }else{
        $star = $main;
    }

    while($star > 0){
        $string .= '<li><i class="fa fa-star"></i></li>';
        $star--;
        $last--;
    }

    if($mid == 1){
        $string .= '<li><i class="fa fa-star-half-o"></i></li>';
        $last--;
    }

    while($last > 0){
        $string .= '<li><i class="fa fa-star-o"></i></li>';
        $last--;
    }
    return $string;
}

?>