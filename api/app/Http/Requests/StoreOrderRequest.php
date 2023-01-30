<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Album;
use Illuminate\Foundation\Http\FormRequest;
use Veelasky\LaravelHashId\Rules\ExistsByHash;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'card'               => ['required', 'string', 'max:16'],
            'expires_at'         => ['required', 'date_format:m/y'],
            'cvv'                => ['required', 'string', 'min:3', 'max:4'],
            'name'               => ['required', 'string', 'max:100'],
            'email'              => ['required', 'string', 'max:100'],
            'phone'              => ['required', 'string', 'max:15'],
            'address'            => ['required', 'string', 'max:150'],
            'items'              => ['required', 'array'],
            'items.album_id'     => ['required', new ExistsByHash(Album::class)],
            'items.quantity'     => ['required', 'integer', 'min:1'],
            'items.delivery_fee' => ['required', 'integer', 'min:0'],
        ];
    }
}
