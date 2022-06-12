<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Stringable;

class Task extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Приоритеты, принадлежащие задаче.
     */
    public function priorities()
    {
        return $this->belongsToMany(Priority::class)
            ->withTimestamps();
    }

    /**
     * Статусы, принадлежащие задаче.
     */
    public function statuses()
    {
        return $this->belongsToMany(Status::class)
            ->withTimestamps();
    }

    /**
     * Теги, принадлежащие задаче.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_tasks', 'tasks_id', 'tag_id');
    }
}