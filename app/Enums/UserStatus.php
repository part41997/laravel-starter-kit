<?php

namespace App\Enums;

enum UserStatus: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;

    public static function isActive(): self
    {
        return new self(self::ACTIVE);
    }

    public static function isInactive(): self
    {
        return new self(self::INACTIVE);
    }

    public function getLabelText(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
        };
    }

    public function getHtmlBadge(): string
    {
        return sprintf('<span class="badge bg-%s">%s</span>', $this->getHtmlBadgeType(), $this->getLabelText());
    }

    public function getHtmlBadgeType(): string
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::INACTIVE => 'danger',
        };
    }

    public static function toArray(): array
    {
        return [
            [
                'id' => static::ACTIVE->value,
                'text' => __('app.user_status.active')

            ],
            [
                'id' => static::INACTIVE->value,
                'text' => __('app.user_status.inactive')
            ]
        ];
    }

    public static function toSelect2($search = null): array
    {
        $statuses = static::toArray();
        $search = strtolower($search);
        if ($search) {
            $statuses = array_filter($statuses, function ($status) use ($search) {
                return str_contains(strtolower($status['text']), $search);
            });
        }
        return array_values($statuses);
    }

    public static function fromValue(int $value): self
    {
        return match ($value) {
            self::ACTIVE->value => self::ACTIVE,
            self::INACTIVE->value => self::INACTIVE,
        };
    }
}
