<?php

use App\Interfaces\MoodPostRepositoryInterface;
use App\Models\Mood;
use App\Models\MoodPost;
use App\Models\User;

class MoodPostRepository implements MoodPostRepositoryInterface{
    public function getAllMoodPost()
    {
        return MoodPost::all();
    }

    public function getAllMoodPostByUserId(int $id)
    {
        return MoodPost::where('user_id', $id);
    }

    public function getMoodPostByMood($moodId)
    {
        return MoodPost::where('mood_id', $moodId);
    }

    public function getMoodPostByUserId(int $moodId, int $id)
    {
        if (!Mood::where('id', $moodId)->exist()){
            throw new \Exception('Mood Doesnt Exist');
        }
        if (!User::where('id', $id)->exist()){
            throw new \Exception('User Doesnt Exist');
        }
        $posts = MoodPost::where('mood_id', $moodId)->where('user_id', $id)->get();

        return $posts;
    }

    public function createMoodPost(int $userId, array $data)
    {
        $moodId = $data['mood_id'] ?? null;

        if (!Mood::where('id', $moodId)->exist()){
            throw new \Exception('Mood Doesnt Exist');
        }

        $post = MoodPost::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $userId,
            'mood_id' => $moodId,
        ]);

        return $post;
    }

    public function editMoodPost(int $id, array $data)
    {
        $post = MoodPost::find($id);
        $moodId = $data['mood_id'] ?? null;

        if (!Mood::where('id', $moodId)->exist()){
            throw new \Exception('Mood Doesnt Exist');
        }

        return $post->update($data);
    }

    public function deleteMoodPost(int $id)
    {
        $post = MoodPost::where('id', $id);
        return $post->delete();
    }
}
