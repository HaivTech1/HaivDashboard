<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'property_uuid' => ['required'],
            'start' => ['required'],
            'amenities'    => ['nullable', 'boolean'],
        ];
    }


    public function author(): User
    {
        return $this->user();
    }

    public function name(): string
    {
        return $this->get('name');
    }

    public function email(): string
    {
        return $this->get('email');
    }

    public function phone(): string
    {
        return $this->get('phone');
    }

    public function passport(): ?string
    {
        return $this->get('passport');
    }

    public function property(): string
    {
        return $this->get('property_uuid');
    }

    public function start(): string
    {
        return $this->get('start');
    }

    public function end(): ?string
    {
        return $this->get('end');
    }

    public function amenities(): bool
    {
        return $this->boolean('amenities');
    }

    public function furnish(): array
    {
        return $this->get('furnish', []);
    }
}
