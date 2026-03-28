<?php

namespace Acm\Community\Http\Requests\Admin;

use Botble\Support\Http\Requests\Request;

class ForumCategoryRequest extends Request
{
    public function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'max:255'],
            'slug'         => ['required', 'string', 'max:255'],
            'description'  => ['nullable', 'string'],
            'order_column' => ['nullable', 'integer'],
        ];
    }
}
