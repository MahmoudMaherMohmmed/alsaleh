<?php

namespace App\Enums;

enum SaleInstallmentStatusEnum: int
{
    case UNPAID = 0;
    case PAID = 1;

    public function type(): int
    {
        return match ($this) {
            self::UNPAID => 0,
            self::PAID => 1,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::UNPAID => trans('sales_installments.status.' . self::UNPAID->name),
            self::PAID => trans('sales_installments.status.' . self::PAID->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::UNPAID => 'badge-danger',
            self::PAID => 'badge-success',
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::UNPAID,
                'value' => trans('sales_installments.status.' . self::UNPAID->name)
            ],
            [
                'id' => self::PAID,
                'value' => trans('sales_installments.status.' . self::PAID->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::PAID->value => trans('sales_installments.status.' . self::PAID->name),
            self::UNPAID->value => trans('sales_installments.status.' . self::UNPAID->name),
        ];
    }
}
