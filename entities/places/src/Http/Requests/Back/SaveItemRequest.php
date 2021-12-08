<?php

namespace InetStudio\BannersPackage\Places\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\BannersPackage\Places\Contracts\Http\Requests\Back\SaveItemRequestContract;

class SaveItemRequest extends FormRequest implements SaveItemRequestContract
{
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле «Название» обязательно для заполнения',
            'name.max' => 'Поле «Название» не должно превышать 255 символов',
            'alias.required' => 'Поле «Алиас» обязательно для заполнения',
            'alias.max' => 'Поле «Алиас» не должно превышать 255 символов',
            'alias.unique' => 'Такое значение поля «Алиас» уже существует',
        ];
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'alias' => 'required|max:255|unique:banners_places,alias,'.$this->get('place_id'),
        ];
    }
}
