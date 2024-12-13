<?php

namespace App\Interfaces;

interface MoodPostRepositoryInterface{
    public function getAllMoodPost();
    public function getMoodPostByMood($moodId);
    public function createMoodPost(int $userId, array $data);
    public function editMoodPost(int $id, array $data);
    public function deleteMoodPost(int $id);
    public function getAllMoodPostByUserId(int $id);
}
