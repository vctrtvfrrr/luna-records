<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlbumRequest extends FormRequest
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
            'name'        => ['string', 'min:1', 'max:120'],
            'artist'      => ['string', 'min:1', 'max:80'],
            'cover'       => ['nullable', 'image', 'max:150'],
            'released_at' => ['nullable', 'date'],
            'duration'    => ['integer', 'min:0'],
            'stock'       => ['integer', 'min:0'],
            'price'       => ['integer', 'min:0'],
        ];
    }
}
