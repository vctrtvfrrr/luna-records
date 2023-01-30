<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Veelasky\LaravelHashId\Eloquent\HashableId;

class Order extends Model
{
    use HasFactory;
    use HashableId;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'album_id',
        'quantity',
        'delivery_fee',
        'total_cost',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'customer_id'  => 'integer',
        'album_id'     => 'integer',
        'quantity'     => 'integer',
        'delivery_fee' => 'integer',
        'total_cost'   => 'integer',
    ];

    /**
     * Get the customer that owns the order.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the album that owns the order.
     */
    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
