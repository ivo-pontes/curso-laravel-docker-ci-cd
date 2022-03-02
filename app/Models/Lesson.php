<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'video','module_id'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

}
