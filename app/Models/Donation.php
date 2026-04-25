<?php

namespace App\Models;

use Botble\Member\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int|null $member_id
 * @property string $amount
 * @property string $currency
 * @property string $status
 * @property string|null $paypal_order_id
 * @property string|null $paypal_capture_id
 * @property string|null $paypal_payer_id
 * @property string $donor_name
 * @property string $donor_email
 * @property string|null $message
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read string $formatted_amount
 */
class Donation extends Model
{
    protected $fillable = [
        'member_id',
        'amount',
        'currency',
        'status',
        'paypal_order_id',
        'paypal_capture_id',
        'paypal_payer_id',
        'donor_name',
        'donor_email',
        'message',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function isCompleted(): bool
    {
        return $this->getAttribute('status') === 'completed';
    }

    public function getFormattedAmountAttribute(): string
    {
        return '$' . number_format((float) $this->getAttribute('amount'), 2);
    }
}
