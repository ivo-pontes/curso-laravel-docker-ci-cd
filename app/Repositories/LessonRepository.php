<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository
{
    protected $entity;
    
    public function __construct(Lesson $lesson)
    {
        $this->entity = $lesson;
    }

    public function getAllLessons()
    {
        return $this->entity->get();
    }

    public function createNewLesson(int $module, array $data)
    {
        $data['module_id'] = $module;
        return $this->entity->create($data);
    }

    public function getLessonByUuid(String $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function updateLessonByUuid(int $module, String $identify,array $data)
    {
        $lesson = $this->getLessonByUuid($identify);
        $data['module_id'] = $module;
        Cache::forget('courses');
        return $lesson->update($data);
    }

    public function deleteLessonByUuid(String $identify)
    {
        $lesson = $this->getLessonByUuid($identify);
        Cache::forget('courses');
        return $lesson->delete();
    }

    public function getLessonsModule(int $module)
    {
        return $this->entity
                        ->where('module_id', $module)
                        ->get();
    }

    public function getLessonByModule(int $module, String $identify)
    {
        return $this->entity->where('module_id', $module)
                               ->where('uuid',$identify)->firstOrFail();
    }
}