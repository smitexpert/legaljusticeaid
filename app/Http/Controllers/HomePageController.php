<?php

namespace App\Http\Controllers;

use App\Advice;
use App\BlogPost;
use App\Lawyer;
use App\LawyerRating;
use App\Ratings;
use App\Service;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question;

class HomePageController extends Controller
{
    //

    public function ratings($id){
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

    public function index(){
        $lawyers = Lawyer::orderBy('experience', 'desc')->limit(6)->get();
        $posts = BlogPost::orderBy('id', 'desc')->limit(8)->get();
        $services = Service::orderBy('id', 'desc')->limit(8)->get();
        $questions = Advice::orderBy('id', 'asc')->limit(5)->get();
        $popular_posts = BlogPost::withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get();
        return view("frontend.index", compact('lawyers', 'posts', 'services', 'questions', 'popular_posts'));
    }
}
