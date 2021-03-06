<?php

namespace App\Http\Requests\News;

use App\Http\Requests\Request;
use CodeZero\UniqueTranslation\UniqueTranslationRule;

class CategoryUpdateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return localizeRules([
            'name' => [
                'required',
                'string',
                'max:255',
                UniqueTranslationRule::for('news_categories')->ignore($this->category->id),
            ],
        ]);
    }
}
