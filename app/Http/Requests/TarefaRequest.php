<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TarefaRequest extends FormRequest
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
            'titulo'=>'required|string|max:255',
            'descricao'=>'nullable|string',
            'concluida'=> 'required|boolean'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'sucess'=>false,
            'errors'=> $validator->errors()
        ],422));
    }

    public function messages()
    {
        return[
            'titulo.required' => 'O titulo da tarefa é obrigatorio',
            'titulo.max'=>'A tarefa deve conter no maximo 255 caracteres'
        ];
        
    }
}
