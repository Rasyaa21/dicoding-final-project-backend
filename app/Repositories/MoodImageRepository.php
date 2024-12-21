<?php

namespace App\Repositories;


use App\Interfaces\MoodImageRepositoryInterface;
use App\Models\MoodImage;

class MoodImageRepository implements MoodImageRepositoryInterface{
    public function getAllMoodImage(){
        return MoodImage::all();
    }

    public function getImageByPostId(int $postId){
        return MoodImage::where('post_id', $postId);
    }
}
