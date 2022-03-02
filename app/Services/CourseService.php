<?php

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{
    protected $repository;
    
    public function __construct(CourseRepository $courseRepository)
    {
        $this->repository = $courseRepository;
    }

    public function getCourses()
    {
        return $this->repository->getAllCourses();
    }

    public function createNewCourse(array $data)
    {
        return $this->repository->createNewCourse($data);
    }

    public function getCourse(String $identify)
    {
        return $this->repository->getCourseByUuid($identify);
    }

    public function updateCourse(String $identify,array $data)
    {
        return $this->repository->UpdateCourseByUuid($identify, $data);
    }

    public function deleteCourse(String $identify)
    {
        return $this->repository->deleteCourseByUuid($identify);
    }
}