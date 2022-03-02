<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Facades\Cache;

class CourseRepository
{
    protected $entity;
    
    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
        return Cache::remember('courses',60*60,function(){
                  return $this->entity->with('modules.lessons')->get();
                });
    }

    public function createNewCourse(array $data)
    {
        return $this->entity->create($data);
    }

    public function getCourseByUuid(String $identify,bool $loadRelationships = true)
    {
        $query = $this->entity->where('uuid', $identify);
        
        if($loadRelationships)
            $query->with('modules.lessons');
        
        return $query->firstOrFail();
    }

    public function updateCourseByUuid(String $identify,array $data)
    {
        $course = $this->getCourseByUuid($identify, false);
        Cache::forget('courses');
        return $course->update($data);
    }

    public function deleteCourseByUuid(String $identify)
    {
        $course = $this->getCourseByUuid($identify, false);
        Cache::forget('courses');
        return $course->delete();
    }
}