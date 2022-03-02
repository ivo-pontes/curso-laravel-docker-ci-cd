<?php

namespace App\Repositories;

use App\Models\Module;
use Illuminate\Support\Facades\Cache;

class ModuleRepository
{
    protected $entity;
    
    public function __construct(Module $module)
    {
        $this->entity = $module;
    }

    public function getAllModules()
    {
        return $this->entity->get();
    }

    public function createNewModule(int $course, array $data)
    {
        $data['course_id'] = $course;
        return $this->entity->create($data);
    }

    public function getModuleByUuid(String $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function updateModuleByUuid(int $course, String $identify,array $data)
    {
        $module = $this->getModuleByUuid($identify);
        Cache::forget('courses');
        $data['course_id'] = $course;
        return $module->update($data);
    }

    public function deleteModuleByUuid(String $identify)
    {
        $module = $this->getModuleByUuid($identify);
        Cache::forget('courses');
        return $module->delete();
    }

    public function getModuleCourse(int $module)
    {
        return $this->entity
                        ->where('course_id', $module)
                        ->get();
    }

    public function getModuleByCourse($module, String $identify)
    {
        return $this->entity->where('course_id', $module)
                               ->where('uuid',$identify)->firstOrFail();
    }
}