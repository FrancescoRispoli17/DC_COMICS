<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('comics')->ignore($this->comic)],
            'description' =>['required'],
            'thumb' =>['required'],
            'price' =>['required'],
            'sale_date' => ['required', 'date', 'before_or_equal:today'],
            'type' =>['required'],
            'page' =>['required'],
            'size' =>['required'],
            'artists' => ['required', 'array'],
        ];
    }
}
