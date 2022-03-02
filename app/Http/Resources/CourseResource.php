<?php

namespace App\Http\Resources;

use App\Http\Resources\ModuleResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'identify' => $this->uuid,
            'title' => $this->name,
            'description' => $this->description,
            'date' => Carbon::make($this->created_at)->format('d-m-Y'),
            'modules' => ModuleResource::collection($this->whenLoaded('modules'))
        ];
    }
}
