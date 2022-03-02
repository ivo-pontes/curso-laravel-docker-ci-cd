<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonFormRequest;
use App\Http\Resources\LessonResource;
use App\Services\LessonService;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $lessonService;

    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($module)
    {
        $lessons = $this->lessonService->getLessonsModule($module);

        return LessonResource::collection($lessons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonFormRequest $request,$module)
    {
        $lesson = $this->lessonService->createNewLesson($request->validated());
        return new LessonResource($lesson);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($module, $identify)
    {
        $lesson = $this->lessonService->getLessonByModule($module, $identify);
        return new LessonResource($lesson);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String $identify
     * @return \Illuminate\Http\Response
     */
    public function update(LessonFormRequest $request, $module, String $identify)
    {
        $this->lessonService->updateLesson($identify, $request->validated());
        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  String $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($module, $identify)
    {
        $lesson = $this->lessonService->deleteLesson($identify);
        return response()->json([],204);
    }
}
