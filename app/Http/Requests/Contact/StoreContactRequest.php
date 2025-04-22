<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'form.name' => 'required|string|max:255',
            'form.email' => 'required|email|max:255',
            'form.telegram' => 'nullable|string|max:255',
            'form.message' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'form.name.required' => 'Пожалуйста, укажите имя',
            'form.name.max' => 'Ваше имя не должно превышать 255 символов',
            'form.email.required' => 'Пожалуйста, укажите почту',
            'form.email.max' => 'Ваша почта не должна превышать 255 символов',
            'form.telegram.max' => 'Ссылка на телеграм не должна превышать 255 символов',
        ];
    }
}
