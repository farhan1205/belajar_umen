<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $table = 'books';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'year'
    ];

    public function category()
    {
        return $this->BelongsTo('App/Models/Category');
    }
}
