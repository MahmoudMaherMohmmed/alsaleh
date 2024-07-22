<?php

namespace App\Enums;

enum ProductTypeEnum: int
{
    case USED = 0;
    case NEW = 1;

    public function type(): int
    {
        return match ($this) {
            self::USED => 0,
            self::NEW => 1,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::USED => trans('products.type.' . self::USED->name),
            self::NEW => trans('products.type.' . self::NEW->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::USED => 'badge-secondary',
            self::NEW => 'badge-primary',
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::USED,
                'value' => trans('products.type.' . self::USED->name)
            ],
            [
                'id' => self::NEW,
                'value' => trans('products.type.' . self::NEW->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::NEW->value => trans('products.type.' . self::NEW->name),
            self::USED->value => trans('products.type.' . self::USED->name),
        ];
    }
}
