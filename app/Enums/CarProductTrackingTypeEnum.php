<?php

namespace App\Enums;

use function Laravel\Prompts\select;

enum CarProductTrackingTypeEnum: int
{
    case RETURNED = 0;
    case NEW = 1;
    case SOLD = 2;

    public function type(): int
    {
        return match ($this) {
            self::RETURNED => 0,
            self::NEW => 1,
            self::SOLD => 2,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::RETURNED => trans('car_product_trackings.type.' . self::RETURNED->name),
            self::NEW => trans('car_product_trackings.type.' . self::NEW->name),
            self::SOLD => trans('car_product_trackings.type.' . self::SOLD->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::RETURNED => 'badge-danger',
            self::NEW => 'badge-info',
            self::SOLD => 'badge-primary',
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::RETURNED,
                'value' => trans('car_product_trackings.type.' . self::RETURNED->name)
            ],
            [
                'id' => self::NEW,
                'value' => trans('car_product_trackings.type.' . self::NEW->name)
            ],
            [
                'id' => self::SOLD,
                'value' => trans('car_product_trackings.type.' . self::SOLD->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::NEW->value => trans('car_product_trackings.type.' . self::NEW->name),
            self::RETURNED->value => trans('car_product_trackings.type.' . self::RETURNED->name),
            self::SOLD->value => trans('car_product_trackings.type.' . self::SOLD->name),
        ];
    }
}
