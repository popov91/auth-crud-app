<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property $name
 */
class Category extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = ['name'];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    /**
     * @return \string[][]
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * @return void
     */
    protected static function booted()
    {
        static::deleted(function ($model) {
            News::where('category_id', $model->id)->delete();
        });
    }
}
