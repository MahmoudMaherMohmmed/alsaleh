<?php

namespace App\Enums;

enum ExpenseCategoryTypeEnum: int
{
    case COMPANY = 0;
    case SALESMAN = 1;

    public function type(): int
    {
        return match ($this) {
            self::COMPANY => 0,
            self::SALESMAN => 1,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::COMPANY => trans('expense_categories.type.' . self::COMPANY->name),
            self::SALESMAN => trans('expense_categories.type.' . self::SALESMAN->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::COMPANY => 'badge-info',
            self::SALESMAN => 'badge-success',
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::COMPANY,
                'value' => trans('expense_categories.type.' . self::COMPANY->name)
            ],
            [
                'id' => self::SALESMAN,
                'value' => trans('expense_categories.type.' . self::SALESMAN->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::SALESMAN->value => trans('expense_categories.type.' . self::SALESMAN->name),
            self::COMPANY->value => trans('expense_categories.type.' . self::COMPANY->name),
        ];
    }
}
