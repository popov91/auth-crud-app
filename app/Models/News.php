<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $title
 * @property string $text
 */
class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'text', 'author_id', 'category_id'];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
