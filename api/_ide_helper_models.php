<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Album
 *
 * @property int $id
 * @property string $name
 * @property string $artist
 * @property string|null $cover
 * @property \Illuminate\Support\Carbon|null $released_at
 * @property int $duration
 * @property int $stock
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string|null $hash
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Track[] $tracks
 * @property-read int|null $tracks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Album byHash(string $hash)
 * @method static \Database\Factories\AlbumFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album query()
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereArtist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereReleasedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereUpdatedAt($value)
 */
	class Album extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $card_last_digits
 * @property string $card_expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string|null $hash
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|Customer byHash(string $hash)
 * @method static \Database\Factories\CustomerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCardExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCardLastDigits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $customer_id
 * @property int $album_id
 * @property int $quantity
 * @property int $delivery_fee
 * @property int $total_cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Album $album
 * @property-read \App\Models\Customer $customer
 * @property-read string|null $hash
 * @method static \Illuminate\Database\Eloquent\Builder|Order byHash(string $hash)
 * @method static \Database\Factories\OrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Album[] $albums
 * @property-read int|null $albums_count
 * @property-read string|null $hash
 * @method static \Illuminate\Database\Eloquent\Builder|Tag byHash(string $hash)
 * @method static \Database\Factories\TagFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Track
 *
 * @property int $id
 * @property int $album_id
 * @property string $number
 * @property string $title
 * @property int $duration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Album $album
 * @property-read string|null $hash
 * @method static \Illuminate\Database\Eloquent\Builder|Track byHash(string $hash)
 * @method static \Database\Factories\TrackFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Track newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Track newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Track query()
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereUpdatedAt($value)
 */
	class Track extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

