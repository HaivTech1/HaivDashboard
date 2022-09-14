<?php

namespace App\Models;

use App\Traits\HasUser;
use App\Models\Property;
use App\Models\Amenities;
use App\Traits\HasAuthor;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    use HasAuthor;
    use HasUuid;

    const TABLE = 'bookings';
    protected $table = self::TABLE;

    protected $fillable = [
        'uuid',
        'name',
        'phone',
        'email',
        'passport',
        'amenities',
        'furnish',
        'totalPrice',
        'isPaid',
        'paidAt',
        'paymentMethod',
        'property_uuid',
        'start',
        'end',
        'status',
        'author_id',
    ];

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $with = [
        'authorRelation', 'property'
    ];

    protected $casts = [
        'furnish' => 'array',
        'amenities' => 'boolean',
        'isPaid' => 'boolean',
        'start'  => 'datetime',
        'end'  => 'datetime',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class,'property_uuid');
    }

    public function id(): string
    {
        return (string) $this->uuid;
    }

    public function total(): int
    {
        return (int) $this->totalPrice;
    }

    public function createdAt()
    {
        return $this->created_at->format('M, d Y');
    }

    public function payment(): bool
    {
        return (bool) $this->isPaid;
    }

    public function amenities(): bool
    {
        return (bool) $this->amenities;
    }

    public function furnish(): array
    {
        return (array) json_decode($this->furnish, true);
    }

    public function getPaymentMethodBadgeAttribute()
    {

        $verify = [
            'cash' => 'fab fa-cc-mastercard me-1',
            'paystack' => 'fab fa-cc-Paypal me-1',
        ];

        return $verify[$this->paymentMethod];
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('uuid', 'like', $term);
        });
    }

}