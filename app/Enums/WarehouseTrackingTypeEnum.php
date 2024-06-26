<?php

namespace App\Enums;

enum WarehouseTrackingTypeEnum: int
{
    case RETURNED = 0;
    case NEW = 1;

    public function type(): int
    {
        return match ($this) {
            self::RETURNED => 0,
            self::NEW => 1,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::RETURNED => trans('warehouse_trackings.status.' . self::RETURNED->name),
            self::NEW => trans('warehouse_trackings.status.' . self::NEW->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::RETURNED => 'badge-danger',
            self::NEW => 'badge-info',
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::RETURNED,
                'value' => trans('warehouse_trackings.status.' . self::RETURNED->name)
            ],
            [
                'id' => self::NEW,
                'value' => trans('warehouse_trackings.status.' . self::NEW->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::NEW->value => trans('warehouse_trackings.status.' . self::NEW->name),
            self::RETURNED->value => trans('warehouse_trackings.status.' . self::RETURNED->name),
        ];
    }
}
