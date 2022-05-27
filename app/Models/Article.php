<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    protected $with = ['category', 'user'];

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d M Y H:i');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters ['search'] ?? false , function ($query, $search)
        {
            return $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%');
        });

        $query->when($filters['category'] ?? false , function ($query, $category)
        {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('id', $category);
            });
        });

        $query->when($filters['user'] ?? false, function ($query, $user){
            $query->whereHas('user', function ($query) use ($user){
                $query->where('id', $user);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User ::class);
    }
}
