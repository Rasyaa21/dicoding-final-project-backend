<?php

use App\Interfaces\MoodRepositoryInterface;
use App\Models\Mood;

class MoodRepository implements MoodRepositoryInterface{
    public function getAllMood(){
        return Mood::all();
    }

    public function getMoodById(int $id){
        return Mood::where('id', $id);
    }

    public function getMoodByName(string $name){
        return Mood::where('mood', '$name');
    }
}
