<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Veelasky\LaravelHashId\Eloquent\HashableId;

class Album extends Model
{
    use HasFactory;
    use HashableId;

    public const COVER_PATH = 'album-covers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'artist',
        'released_at',
        'duration',
        'stock',
        'price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'released_at' => 'datetime',
        'duration'    => 'integer',
        'stock'       => 'integer',
        'price'       => 'integer',
    ];

    /**
     * Get the tracks for the album.
     */
    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    /**
     * The tags that belong to the album.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
