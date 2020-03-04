<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
        $customer = $this->route('customer');

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'cpf' => 'required|min:11|max:11|unique:customers,cpf,' . $customer->id,
            'email' => 'required|email|unique:customers,cpf,' . $customer->id,
            'birth_at' => 'required|date',
        ];
    }
}
