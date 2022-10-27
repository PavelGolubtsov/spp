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
     * Таблица базы данных, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * Соединение с базой данных, используемое моделью.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * Первичный ключ, связанный с таблицей базы данных.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    //public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    //protected $keyType = 'string';

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
     * Статусы, принадлежащие задаче.
     */
    public function statuses()
    {
        //return $this->belongsToMany(Status::class);
        return $this->belongsToMany(Status::class, 'status_task', 'task_id', 'status_id');
            //->wherePivotIn('status_id', [1, 2]);
    }

    /**
     * Приоритеты, принадлежащие задаче.
     */
    public function priorities()
    {
        //return $this->belongsToMany(Priority::class);
        return $this->belongsToMany(Priority::class, 'priority_task', 'task_id', 'priority_id');
            //->orderBy('priority_id', 'ASC');
    }

    /**
     * Теги, принадлежащие задаче.
     */
    public function tags()
    {
        //return $this->belongsToMany(Tag::class);
        return $this->belongsToMany(Tag::class, 'tag_tasks', 'tasks_id', 'tag_id');
    }
}