<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Course;

class CourseObserver
{
    /**
     * Handle the Course "created" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function creating(Course $course)
    {
        $course->uuid = (string) Str::uuid();
    }
}
