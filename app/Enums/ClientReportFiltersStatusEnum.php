<?php

namespace App\Enums;

enum ClientReportFiltersStatusEnum: int
{
    case DISABLE = 0;
    case ENABLE = 1;

    public function type(): int
    {
        return match ($this) {
            self::DISABLE => 0,
            self::ENABLE => 1,
        };
    }

    public function trans(): string
    {
        return match ($this) {
            self::DISABLE => trans('clients.report_filters_status.' . self::DISABLE->name),
            self::ENABLE => trans('clients.report_filters_status.' . self::ENABLE->name),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::DISABLE => 'badge-danger',
            self::ENABLE => 'badge-success',
        };
    }

    public static function types(): array
    {
        return [
            [
                'id' => self::DISABLE,
                'value' => trans('clients.report_filters_status.' . self::DISABLE->name)
            ],
            [
                'id' => self::ENABLE,
                'value' => trans('clients.report_filters_status.' . self::ENABLE->name)
            ]
        ];
    }

    public static function options(): array
    {
        return [
            self::ENABLE->value => trans('clients.report_filters_status.' . self::ENABLE->name),
            self::DISABLE->value => trans('clients.report_filters_status.' . self::DISABLE->name),
        ];
    }
}
