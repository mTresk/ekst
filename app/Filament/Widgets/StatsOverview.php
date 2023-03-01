<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Feedback;
use App\Models\Review;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $articlesCount = Article::count();
        $reviewsCount = Review::count();
        $feedbackCount = Feedback::count();
        return [
            Card::make('Количество статей', $articlesCount),
            Card::make('Количество отзывов', $reviewsCount),
            Card::make('Количество сообщений', $feedbackCount),
        ];
    }
}
