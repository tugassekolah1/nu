<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
    'nu_member_id', 'transaction_code', 'amount', 'payment_proof', 'payment_status',
];

    public function member(): BelongsTo
    {
        return $this->belongsTo(NuMember::class, 'nu_member_id');
    }
}