<?php

namespace InetStudio\BannersPackage\Banners\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\BannersPackage\Banners\Contracts\Http\Requests\Back\SaveItemRequestContract;

/**
 * Class SaveItemRequest.
 */
class SaveItemRequest extends FormRequest implements SaveItemRequestContract
{
    /**
     * Определить, авторизован ли пользователь для этого запроса.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Сообщения об ошибках.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Поле «Заголовок» обязательно для заполнения',
            'title.max' => 'Поле «Заголовок» не должно превышать 255 символов',

            'href.required' => 'Поле «Ссылка» обязательно для заполнения',
            'href.max' => 'Поле «Ссылка» не должно превышать 255 символов',
            'href.url' => 'Поле «Ссылка» содержит значение в некорректном формате',

            'date_start.date_format' => 'Поле «Дата начала» должно быть в формате дд.мм.гггг чч:мм',

            'date_end.date_format' => 'Поле «Дата окончания» должно быть в формате дд.мм.гггг чч:мм',
            'date_end.after_or_equal' => 'Поле «Дата окончания» не должно быть раньше даты начала',

            'places.required' => 'Поле «Расположения» обязательно для заполнения',
        ];
    }

    /**
     * Правила проверки запроса.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|max:255',
            'href' => 'required|max:1000|url',
            'date_start' => 'nullable|date_format:d.m.Y H:i',
            'date_end' => 'nullable|date_format:d.m.Y H:i|after_or_equal:date_start',
            'places' => 'required',
        ];

        return $rules;
    }
}
