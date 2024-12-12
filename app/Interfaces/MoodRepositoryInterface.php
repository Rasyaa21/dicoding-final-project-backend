<?php

namespace App\Interfaces;

interface MoodRepositoryInterface{
    public function getAllMood();
    public function getMoodById(int $id);
    public function getMoodByName(string $name);
}

