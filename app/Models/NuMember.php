<?php
namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NuMember extends Model
{
    protected $fillable = [
        'nik', 'full_name', 'phone', 'gender', 'address', 'photo',
        'member_card_no', 'status', 'payment_status',
        'registration_status', 'rejection_reason',
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Status permintaan pendaftaran anggota.
     *
     * Nilai kolom `registration_status` (pending|accepted|rejected) dipakai bila sudah
     * diisi. Data lama (sebelum kolom ini ada) diturunkan dari status keanggotaan:
     * anggota aktif dianggap diterima, selain itu masih menunggu.
     */
    public function registrationState(): string
    {
        if ($this->registration_status !== null) {
            return $this->registration_status;
        }

        return $this->status === 'active' ? 'accepted' : 'pending';
    }
}