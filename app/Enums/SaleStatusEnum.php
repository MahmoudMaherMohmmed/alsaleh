<?php

namespace App\Enums;

enum SaleStatusEnum: int
{
    case RETURNED = 0;
    case INSTALLMENTS_BEING_PAID = 1;
    case COMPLETED = 2;

    public function type(): int
    {
        return match ($this) {
            self::RETURNED => 0,
            self::INSTALLMENTS_BEING_PAID => 1,
            self::COMPLETED => 2,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::RETURNED => trans('sales.status.' . self::RETURNED->name),
            self::INSTALLMENTS_BEING_PAID => trans('sales.status.' . self::INSTALLMENTS_BEING_PAID->name),
            self::COMPLETED => trans('sales.status.' . self::COMPLETED->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::RETURNED => 'badge-danger',
            self::INSTALLMENTS_BEING_PAID => 'badge-info',
            self::COMPLETED => 'badge-success',
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::RETURNED,
                'value' => trans('sales.status.' . self::RETURNED->name)
            ],
            [
                'id' => self::INSTALLMENTS_BEING_PAID,
                'value' => trans('sales.status.' . self::INSTALLMENTS_BEING_PAID->name)
            ],
            [
                'id' => self::COMPLETED,
                'value' => trans('sales.status.' . self::COMPLETED->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::INSTALLMENTS_BEING_PAID->value => trans('sales.status.' . self::INSTALLMENTS_BEING_PAID->name),
            self::COMPLETED->value => trans('sales.status.' . self::COMPLETED->name),
            self::RETURNED->value => trans('sales.status.' . self::RETURNED->name),
        ];
    }
}
