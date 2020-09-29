<?php
declare(strict_types=1);

namespace App\Services;


use App\Models\OpeningHour;
use Illuminate\Database\Eloquent\Builder;

class OpeningHours
{
    public static $weekDays = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ];

    public function isOpen(\DateTimeInterface $dateTime): bool
    {
        $weekNumber = (int)$dateTime->format('W');
        $weekRepeatMode = $this->getWeekRepeatMode($weekNumber);
        $open = OpeningHour::where(
            [
                ['weekday', '=', $dateTime->format('w')],
                ['open', '<', $dateTime->format('H:i:s')],
                ['close', '>', $dateTime->format('H:i:s')],
            ]
        )->where(
            static function (Builder $q) use ($weekRepeatMode) {
                $q->where('repeat', 0)->orWhere('repeat', $weekRepeatMode);
            }
        )->first();
        return $open !== null;
    }

    public function nextOpen(\DateTimeInterface $dateTime): ?\DateTimeInterface
    {
        $weekDay = (int)$dateTime->format('w');
        $weekNumber = (int)$dateTime->format('W');
        $weekRepeatMode = $this->getWeekRepeatMode($weekNumber);
        $open = OpeningHour::where(
            [
                ['weekday', '>=', $weekDay],
                ['open', '<', $dateTime->format('H:i:s')],
            ]
        )->where(
            static function (Builder $q) use ($weekRepeatMode) {
                $q->where('repeat', 0)->orWhere('repeat', $weekRepeatMode);
            }
        )->first();
        if ($open !== null) {
            $openWeekday = self::$weekDays[$open->weekday];
            $open = new \DateTimeImmutable($openWeekday . ' ' . $open->open);
            return $open;
        }
        return null;
    }

    public function getWeekRepeatMode(int $weekNumber): int
    {
        if ($weekNumber % 2 === 0) {
            return OpeningHour::REPEAT_EVEN_WEEKS;
        }
        return OpeningHour::REPEAT_ODD_WEEKS;
    }
}
