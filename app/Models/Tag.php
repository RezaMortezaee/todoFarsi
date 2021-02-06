<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Methods
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
    }

    public function getNameAttribute($name)
    {
        $this->attributes['name'] = ucfirst($name);
    }

    /**
      Relations
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
