<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    public const MEMBER_STAMP_TARGET = 8;

    protected $fillable = [
        'customer_code',
        'member_code',
        'name',
        'phone',
        'address',
        'reward_redemptions',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getCompletedWashOrdersCountAttribute(): int
    {
        return $this->orders()
            ->whereIn('status', ['Siap Diambil', 'Diambil'])
            ->count();
    }

    public function getUnusedStampsAttribute(): int
    {
        return max($this->completed_wash_orders_count - ($this->reward_redemptions * self::MEMBER_STAMP_TARGET), 0);
    }

    public function getAvailableRewardsAttribute(): int
    {
        return intdiv($this->unused_stamps, self::MEMBER_STAMP_TARGET);
    }

    public function getCurrentStampProgressAttribute(): int
    {
        if ($this->available_rewards > 0) {
            return self::MEMBER_STAMP_TARGET;
        }

        return $this->unused_stamps % self::MEMBER_STAMP_TARGET;
    }
}
