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
        return $this->belongsToMany(Priority::class);
    }

    /**
     * Статусы, принадлежащие задаче.
     */
    public function statuses()
    {
        return $this->belongsToMany(Status::class);
    }

    /**
     * Получить теги задачи.
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    /*
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($task) {
            $task->{$task->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
    */
}