<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Veelasky\LaravelHashId\Eloquent\HashableId;

class Track extends Model
{
    use HasFactory;
    use HashableId;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'album_id',
        'number',
        'title',
        'duration',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'number'   => 'string',
        'duration' => 'integer',
    ];

    /**
     * Get the album that owns the track.
     */
    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
