<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSportRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:200'],
            'description' => ['string', 'nullable', 'max:500'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ];
    }
}
