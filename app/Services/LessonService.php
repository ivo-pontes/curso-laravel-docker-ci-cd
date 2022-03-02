<?php

namespace App\Services;

use App\Repositories\ModuleRepository;
use App\Repositories\LessonRepository;

class LessonService
{
    protected $repository;
    protected $moduleRepository;
    
    public function __construct(LessonRepository $lessonRepository, ModuleRepository $moduleRepository)
    {
        $this->repository = $lessonRepository;
        $this->moduleRepository = $moduleRepository;
    }

    public function getLessonsModule(String $module)
    {
        $module = $this->moduleRepository->getModuleByUuid($module);
        return $this->repository->getLessonsModule($module->id);
    }

    public function createNewLesson(array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);
        return $this->repository->createNewLesson($module->id, $data);
    }

    public function getLessonByModule($module, String $identify)
    {
        $module = $this->moduleRepository->getModuleByUuid($module);
        return $this->repository->getLessonByModule($module->id, $identify);
    }

    public function updateLesson(String $identify,array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);
        return $this->repository->UpdateLessonByUuid($module->id, $identify, $data);
    }

    public function deleteLesson(String $identify)
    {
        return $this->repository->deleteLessonByUuid($identify);
    }
}