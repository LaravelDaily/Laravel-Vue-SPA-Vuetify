<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\Http\Resources\ProductResource;
// use App\Post;

class PostController extends Controller
{
    public function getPosts()
    {
        //dummy posts array for now
        $posts_array = array(
            array(
                "author" => "Guest",
                "text" => "ajshd ajhsdkah jakshdkahsdkha kahsdkjhasdjk akjshdk",
                "time" => "22 May 2019 at 22:10"
            ),
            array(
                "author" => "Guest",
                "text" => "kzvkx akjshdk",
                "time" => "10 June 2019 at 12:45"
            ),
            array(
                "author" => "Guest",
                "text" => "azx jhasdjk akjshdk",
                "time" => "09 Jan 2017 at 2:55"
            )
        );
        $posts = json_encode($posts_array);
        return $posts;
    }
}
