<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;

class ModuleService
{
    protected $repository;
    protected $courseRepository;
    
    public function __construct(ModuleRepository $moduleRepository, CourseRepository $courseRepository)
    {
        $this->repository = $moduleRepository;
        $this->courseRepository = $courseRepository;
    }

    public function getModulesByCourse(String $course)
    {
        $course = $this->courseRepository->getCourseByUuid($course);
        return $this->repository->getModuleCourse($course->id);
    }

    public function createNewModule(array $data)
    {
        $course = $this->courseRepository->getCourseByUuid($data['course']);
        return $this->repository->createNewModule($course->id, $data);
    }

    public function getModuleByCourse($course, String $identify)
    {
        $course = $this->courseRepository->getCourseByUuid($course);
        return $this->repository->getModuleByCourse($course->id, $identify);
    }

    public function updateModule(String $identify,array $data)
    {
        $course = $this->courseRepository->getCourseByUuid($data['course']);
        return $this->repository->UpdateModuleByUuid($course->id, $identify, $data);
    }

    public function deleteModule(String $identify)
    {
        return $this->repository->deleteModuleByUuid($identify);
    }
}