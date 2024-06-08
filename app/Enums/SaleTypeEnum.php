<?php

namespace App\Enums;

enum SaleTypeEnum: int
{
    case INSTALLMENT = 0;
    case CASH = 1;

    public function type(): int
    {
        return match ($this) {
            self::INSTALLMENT => 0,
            self::CASH => 1,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::INSTALLMENT => trans('sales.type.' . self::INSTALLMENT->name),
            self::CASH => trans('sales.type.' . self::CASH->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::INSTALLMENT => 'badge-danger',
            self::CASH => 'badge-success',
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::INSTALLMENT,
                'value' => trans('sales.type.' . self::INSTALLMENT->name)
            ],
            [
                'id' => self::CASH,
                'value' => trans('sales.type.' . self::CASH->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::CASH->value => trans('sales.type.' . self::CASH->name),
            self::INSTALLMENT->value => trans('sales.type.' . self::INSTALLMENT->name),
        ];
    }
}
