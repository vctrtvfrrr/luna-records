<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Veelasky\LaravelHashId\Eloquent\HashableId;

class Tag extends Model
{
    use HasFactory;
    use HashableId;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The albums that belong to the tag.
     */
    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Album::class);
    }
}
