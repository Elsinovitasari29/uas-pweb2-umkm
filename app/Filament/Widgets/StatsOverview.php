<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Umkm;
use App\Models\Product; // Ganti sesuai nama model produk kamu
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total User', User::count())
                ->color('success')
                ->icon('heroicon-s-user-group')
                ->description('Jumlah total pengguna yang terdaftar'),
            Stat::make('Total UMKM', Umkm::count())
                ->color('warning')
                ->icon('heroicon-s-shopping-cart')
                ->description('Jumlah total UMKM yang terdaftar'),
            Stat::make('Total Pembina', User::count())
                ->color('danger')
                ->icon('heroicon-s-user-group')
                ->description('Jumlah total pembina yang terdaftar'),
            
        ];
    }
}