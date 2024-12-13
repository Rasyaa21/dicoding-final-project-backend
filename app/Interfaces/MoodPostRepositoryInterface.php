<?php

namespace App\Interfaces;

interface MoodPostRepositoryInterface{
    public function getAllMoodPost();
    public function getMoodPostByMood($moodId);
    public function createMoodPost(int $userId);
    public function editMoodPost(int $id, int $userId);
    public function deleteMoodPost(int $id, int $userId);
    public function getAllMoodPostByUserId(int $id);
    public function getAllMoodPostById(int $id, int $userId);
}
