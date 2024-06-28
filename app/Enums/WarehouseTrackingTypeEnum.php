<?php

namespace App\Enums;

use function Laravel\Prompts\select;

enum WarehouseTrackingTypeEnum: int
{
    case RETURNED = 0;
    case NEW = 1;
    case MOVED_TO_CAR = 2;

    public function type(): int
    {
        return match ($this) {
            self::RETURNED => 0,
            self::NEW => 1,
            self::MOVED_TO_CAR => 2,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::RETURNED => trans('warehouse_trackings.type.' . self::RETURNED->name),
            self::NEW => trans('warehouse_trackings.type.' . self::NEW->name),
            self::MOVED_TO_CAR => trans('warehouse_trackings.type.' . self::MOVED_TO_CAR->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::RETURNED => 'badge-danger',
            self::NEW => 'badge-info',
            self::MOVED_TO_CAR => 'badge-primary',
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::RETURNED,
                'value' => trans('warehouse_trackings.type.' . self::RETURNED->name)
            ],
            [
                'id' => self::NEW,
                'value' => trans('warehouse_trackings.type.' . self::NEW->name)
            ],
            [
                'id' => self::MOVED_TO_CAR,
                'value' => trans('warehouse_trackings.type.' . self::MOVED_TO_CAR->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::NEW->value => trans('warehouse_trackings.type.' . self::NEW->name),
            self::RETURNED->value => trans('warehouse_trackings.type.' . self::RETURNED->name),
            self::MOVED_TO_CAR->value => trans('warehouse_trackings.type.' . self::MOVED_TO_CAR->name),
        ];
    }
}
