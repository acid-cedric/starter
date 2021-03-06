<?php

namespace App\Http\Controllers\Brickables;

use Illuminate\Http\Request;
use Okipa\LaravelBrickables\Models\Brick;

class TwoTextImageBricksController extends BricksController
{
    /** @inheritDoc */
    protected function stored(Request $request, Brick $brick): void
    {
        /** @var \Spatie\MediaLibrary\HasMedia\HasMediaTrait $brick */
        $brick->addMediaFromRequest('right_image')->toMediaCollection('images');
    }

    /** @inheritDoc */
    protected function updated(Request $request, Brick $brick): void
    {
        if ($request->file('right_image')) {
            /** @var \Spatie\MediaLibrary\HasMedia\HasMediaTrait $brick */
            $brick->addMediaFromRequest('right_image')->toMediaCollection('images');
        }
    }
}
