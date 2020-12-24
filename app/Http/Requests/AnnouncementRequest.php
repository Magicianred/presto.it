<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'title'=>'required|max:120',
            'body'=>'required|max:940',
            'price'=>'required|max:40',
            // 'img'=>'required',
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Il titolo è obbiligatorio',
            'title.max'=>'Il titolo è troppo lungo',
            'body.max'=>'La descrizione è troppo lunga',
            'body.required'=>'La descrizione è obbligatoria',
            'price.required'=>'Il prezzo è obbiligatorio',
            'category.required'=>'La categoria è obbiligatoria',
            // 'img.required'=>'Le immagini sono obbligatorie'
            ];
    }
}
