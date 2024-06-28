<?php

namespace App\Enums;

enum SaleInstallmentTypeEnum: int
{
    case DEPOSIT = 0;
    case INSTALLMENT = 1;

    public function type(): int
    {
        return match ($this) {
            self::DEPOSIT => 0,
            self::INSTALLMENT => 1,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::DEPOSIT => trans('sale_installments.type.' . self::DEPOSIT->name),
            self::INSTALLMENT => trans('sale_installments.type.' . self::INSTALLMENT->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::DEPOSIT => 'badge-danger',
            self::INSTALLMENT => 'badge-success',
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::DEPOSIT,
                'value' => trans('sale_installments.type.' . self::DEPOSIT->name)
            ],
            [
                'id' => self::INSTALLMENT,
                'value' => trans('sale_installments.type.' . self::INSTALLMENT->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::INSTALLMENT->value => trans('sale_installments.type.' . self::INSTALLMENT->name),
            self::DEPOSIT->value => trans('sale_installments.type.' . self::DEPOSIT->name),
        ];
    }
}
