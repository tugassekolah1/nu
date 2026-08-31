<?php
namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NuMember extends Model
{
    protected $fillable = [
        'nik', 'full_name', 'phone', 'gender', 'address',
        'member_card_no', 'status', 'payment_status',
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}