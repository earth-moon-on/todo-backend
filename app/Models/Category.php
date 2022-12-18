<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        $this->hasOne(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function search($category)
    {
        $query = auth()->user()->categories()->where('name', 'LIKE' ,"%{$category}%")->orderBy('name')->paginate();
        return $query;
    }


}
