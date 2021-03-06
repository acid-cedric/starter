<?php

namespace App\Brickables;

use App\Http\Requests\Request;
use Okipa\LaravelBrickables\Abstracts\Brickable;

class OneTextColumn extends Brickable
{
    /** @inheritDoc */
    protected function setStoreValidationRules(): array
    {
        return localizeRules(['text' => ['required', 'string']]);
    }

    /** @inheritDoc */
    protected function setUpdateValidationRules(): array
    {
        return localizeRules(['text' => ['required', 'string']]);
    }
}
