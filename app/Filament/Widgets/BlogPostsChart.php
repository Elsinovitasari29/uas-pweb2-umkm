<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Builder;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Post per Kategori';

    protected function getData(): array
    {
        $data = \App\Models\KategoriUmkm::all()->map(function ($kategori) {
            return [
                'label' => $kategori->nama,
                'value' => $kategori->umkm->count(),
            ];
        });

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Post',
                    'data' => $data->pluck('value')->toArray(),
                    'backgroundColor' => array_map(function ($item) {
                        return $item['label'] === 'Lain-lain' ? '#F87979' : '#3490DC';
                    }, $data->toArray()),
                    'borderColor' => array_map(function ($item) {
                        return $item['label'] === 'Lain-lain' ? '#F87979' : '#3490DC';
                    }, $data->toArray()),
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $data->pluck('label')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

