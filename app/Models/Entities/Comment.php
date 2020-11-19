<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *     schema="events",
 *     description="Comment model",
 *     type="object",
 *     title="Comment model",
 *
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="title", type="string", description="comment title", example="אירוע חנוכה"),
 *     @OA\Property(property="content", type="string", description="comment description", example="חג החנוכה הוא..."),
 *     @OA\Property(property="is_active", type="boolean", description="is the comment displayed in the app"),
 * )
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';

    protected $fillable = [
        'title',
        'content',
        'is_active',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }
}
