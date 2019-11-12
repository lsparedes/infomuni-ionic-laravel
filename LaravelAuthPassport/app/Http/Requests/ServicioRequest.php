<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
     
                return[
                    //'codigo'            => 'required|string|max:191|unique:items',
                    'nombre'              => 'required|string|max:70',
                    'direccion'     => 'required|string|max:70',
                    'contacto'            => 'required|numeric|max:15',
                    'correo'          => 'required|numeric|min:0|max:99999999',
                    'dia_inicio'       => 'required|string|max:20',
                    'dia_termino'              => 'required|string|max:20',
                    'horario_apertura'            => 'required|string|max:10',
                    'horario_cierre'          => 'required|string|max:10',
                    'descripcion_servicio'          => 'required|string|max:240'
                ];
            
        }
    

    
}
