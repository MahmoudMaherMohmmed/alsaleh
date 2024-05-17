<?php

namespace App\Enums;

enum ClientTypeEnum: int
{
    case SALES_MAN = 0;

    public function type(): int
    {
        return match ($this) {
            self::SALES_MAN => 0
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::SALES_MAN => trans('clients.type.' . self::SALES_MAN->name)
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::SALES_MAN => 'badge-info'
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::SALES_MAN,
                'value' => trans('clients.type.' . self::SALES_MAN->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::SALES_MAN->value => trans('clients.type.' . self::SALES_MAN->name)
        ];
    }
}
