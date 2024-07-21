<?php

namespace App\Enums;

use function Laravel\Prompts\select;

enum WarehouseTrackingTypeEnum: int
{
    case RETURNED = 0;
    case NEW = 1;
    case MOVED_TO_CAR = 2;
    case TRANSFER_TO_ANOTHER_WAREHOUSE = 3;
    case DAMAGED = 4;

    public function type(): int
    {
        return match ($this) {
            self::RETURNED => 0,
            self::NEW => 1,
            self::MOVED_TO_CAR => 2,
            self::TRANSFER_TO_ANOTHER_WAREHOUSE => 3,
            self::DAMAGED => 4,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::RETURNED => trans('warehouse_trackings.type.' . self::RETURNED->name),
            self::NEW => trans('warehouse_trackings.type.' . self::NEW->name),
            self::MOVED_TO_CAR => trans('warehouse_trackings.type.' . self::MOVED_TO_CAR->name),
            self::TRANSFER_TO_ANOTHER_WAREHOUSE => trans('warehouse_trackings.type.' . self::TRANSFER_TO_ANOTHER_WAREHOUSE->name),
            self::DAMAGED => trans('warehouse_trackings.type.' . self::DAMAGED->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::RETURNED => 'badge-danger',
            self::NEW => 'badge-primary',
            self::MOVED_TO_CAR => 'badge-secondary',
            self::TRANSFER_TO_ANOTHER_WAREHOUSE => 'badge-info',
            self::DAMAGED => 'badge-danger',
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
            ],
            [
                'id' => self::TRANSFER_TO_ANOTHER_WAREHOUSE,
                'value' => trans('warehouse_trackings.type.' . self::TRANSFER_TO_ANOTHER_WAREHOUSE->name)
            ],
            [
                'id' => self::DAMAGED,
                'value' => trans('warehouse_trackings.type.' . self::DAMAGED->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::NEW->value => trans('warehouse_trackings.type.' . self::NEW->name),
            self::RETURNED->value => trans('warehouse_trackings.type.' . self::RETURNED->name),
            self::MOVED_TO_CAR->value => trans('warehouse_trackings.type.' . self::MOVED_TO_CAR->name),
            self::TRANSFER_TO_ANOTHER_WAREHOUSE->value => trans('warehouse_trackings.type.' . self::TRANSFER_TO_ANOTHER_WAREHOUSE->name),
            self::DAMAGED->value => trans('warehouse_trackings.type.' . self::DAMAGED->name),
        ];
    }
}
