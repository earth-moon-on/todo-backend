<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'completed',
    ];

    protected $casts = [
        'completed' => 'boolean',
    ];

    public function users()
    {
        $this->hasOne(User::class);
    }

    public function categories()
    {
        return $this->hasOne(Category::class);
    }

    public function search($task)
    {
        // $query = $this->where('name', 'LIKE' ,"%{$task}%")->orderBy('name')->paginate();
        $query = auth()->user()->tasks()->where('tasks.name', 'LIKE' ,"%{$task}%")->orderBy('name')->paginate();
        return $query;
    }

}
