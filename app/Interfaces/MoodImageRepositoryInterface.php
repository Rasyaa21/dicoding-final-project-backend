<?php

namespace App\Interfaces;

interface MoodImageRepositoryInterface{
    public function getAllMoodImage();
    public function getImageByPostId(int $postId);
}

