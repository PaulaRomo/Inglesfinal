<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnosCreateRequest extends FormRequest
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
          //
          'name' => 'required|max:50|min:15|Regex:/^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ\-! ,\'\"\/@\.:\(\)]+$/',
          'numcontrol' => 'required|max:10|min:5|unique:datos_alumnos,numcontrol|regex:/^[a-zA-Z][0-9]+$/'

      ];
    }
}
