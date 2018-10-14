<?php

namespace Satoved\Percentage;

use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class Percentage extends Number
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'percentage';

    public $precision = 2;

    public function __construct(string $name, ?string $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'precision' => $this->precision,
            'min' => 0,
            'max' => 100,
        ]);

        $this->resolveUsing(function ($value) {
            return $value * 100;
        });

        $this->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
            $value = $request[$requestAttribute];
            $model->{$attribute} = $value === '' ? null : round($value, $this->precision) / 100;
        });
    }

    public function precision(int $value): self
    {
        $this->precision = $value;
        $this->withMeta(['precision' => $value]);

        return $this;
    }
}
