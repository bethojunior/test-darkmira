<?php

namespace App\Http\Requests\Memoirs;

use Illuminate\Foundation\Http\FormRequest;

class CreateMemoirsRequest extends FormRequest
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
    public function rules() : array
    {
        return [
            'image'      => 'required',
            'name'       => 'required',
            'birth_date' => 'required',
            'death_date' => 'required',
            'content'    => 'required'
        ];
    }


    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'name.required'          => 'É necessário um nome',
            'image.required'         => 'É necessário uma imagem',
            'birth_date.required'    => 'É necessário a data de nascimento',
            'date_death.required'    => 'É necessário a data de morte',
            'content.required'       => 'É necessário um depoimento',
        ];
    }

}
