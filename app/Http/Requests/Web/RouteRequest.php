<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RouteRequest extends FormRequest
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



        if ($this->type == 'status') {
            return [
                'isActive' => ['boolean']
            ];
        } else {
            return [
                'role'      => ['required'],
                'label'     => ['required', 'string'],
                'slug'      => [
                    'required',
                    Rule::unique('list_routes', 'label')->ignore($this->route('id'))
                ],
                'icon'      => ['required'],
                'route'     => ['nullable'],
                'component' => ['nullable'],
                'isSubmenu' => ['boolean'],
                'submenu'   => ['required_if:isSubmenu,true'],

            ];
        }
    }
    public function messages()
    {
        return [
            'submenu.required_if' => 'The parent select is required.',
        ];
    }
}
