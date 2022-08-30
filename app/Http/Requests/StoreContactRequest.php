<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'email' => ['nullable'],
            'phone' => ['nullable'],
            'message' => ['required'],
        ];
    }

    public function name(): string
    {
        return $this->get('name');
    }

    public function email(): ?string
    {
        return $this->get('email');
    }

    public function phone(): ?string
    {
        return $this->get('phone');
    }

    public function message(): string
    {
        return $this->get('message');
    }
}
