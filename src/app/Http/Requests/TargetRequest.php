<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TargetRequest extends FormRequest
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
            'target_weight' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.numeric' => '数字で入力してください',
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            foreach (['target_weight'] as $field) {
                $value = $this->input($field);
                if (!is_numeric($value)) continue;

                if (strlen((string) $value) > 5) {
                    $validator->errors()->add($field, '4桁までの数字で入力してください');
                }

                if (str_contains($value, '.')) {
                    $decimalPart = explode('.', $value)[1] ?? '';
                    if (strlen($decimalPart) > 1) {
                        $validator->errors()->add($field, '小数点は1桁で入力してください');
                    }
                }
            }
        });
    }
}
