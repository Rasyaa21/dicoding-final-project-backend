<?php

namespace App\Interfaces;

interface MoodImageRepository{
    public function getAllMoodImage();
    public function getImageByUserId(int $userId);
    public function addMoodImage($userId);
    public function deleteMoodImageById(int $id);
}

