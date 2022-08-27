<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'title'                             => ['required', 'max:50'],
            'price'                             => ['required'],
            'purpose'                           => ['required'],
            'built'                             => ['required'],
            'category'                          => ['required'],
            'address'                           => ['required'],
            'description'                       => ['required'],
        ];
    }

    public function author(): User
    {
        return $this->user();
    }

    public function title(): string
    {
        return $this->get('title');
    }

    public function price(): string
    {
        return $this->get('price');
    }
    
    public function built(): ?string
    {
        return $this->get('built');
    }

    public function bedroom(): ?string
    {
        return $this->get('bedroom');
    }

    public function bathroom(): ?string
    {
        return $this->get('bathroom');
    }

    public function category(): ?string
    {
        return $this->get('category');
    }

    public function purpose(): ?string
    {
        return $this->get('purpose');
    }

    public function address(): ?string
    {
        return $this->get('address');
    }
    
    public function latitude(): ?string
    {
        return $this->get('latitude');
    }

    public function longitude(): ?string
    {
        return $this->get('longitude');
    }

    public function description(): string
    {
        return $this->get('description');
    }

    public function specifications(): ?string
    {
        return $this->get('specifications');
    }

    public function image(): ?array
    {
        return $this->image;
    }

    public function video(): ?string
    {
        return $this->video;
    }
}