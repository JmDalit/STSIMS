<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
        switch ($this->type) {
            case 'delete':
                return [
                    'isDelete' => ['boolean']
                ];
                break;
            case 'status':
                return [
                    'isActive' => ['boolean']
                ];
                break;
            default:
                return [
                    'name' => [
                        'required',
                        'string',
                        Rule::unique('list_courses', 'name')->ignore($this->route('id')),
                    ],
                    'field' => ['required'],
                    'abbreviation' => ['required', 'string'],
                ];
                break;
        }
    }

    public function attributes(): array
    {
        return [
            'field'         => 'category',
        ];
    }
}
