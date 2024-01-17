<?php

namespace App\Filament\Resources\ReservationResource\Widgets;

use Filament\Widgets\ChartWidget;

class Stats extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
