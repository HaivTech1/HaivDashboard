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
    use MultiTenantModelTrait;

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
        'level',
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
        'paidAt'  => 'datetime',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class,'property_uuid');
    }

    public function id(): string
    {
        return (string) $this->uuid;
    }

    public function name(): string
    {
        return (string) $this->name;
    }

    public function email(): string
    {
        return (string) $this->email;
    }

    public function phone(): string
    {
        return (string) $this->phone;
    }

    public function total(): int
    {
        return (int) $this->totalPrice;
    }

    public function createdAt()
    {
        return $this->created_at->format('M, d Y');
    }

    public function level(): string
    {
        return (string) $this->level;
    }

    public function paidAt(): string
    {
        return (string) $this->paidAt;
    }

    public function payment(): bool
    {
        return (bool) $this->isPaid;
    }

    public function amenities(): bool
    {
        return (bool) $this->amenities;
    }

    public function start(): string
    {
        return (string) $this->start->format('M, d Y');
    }

    public function end(): string
    {
        return (string) $this->end->format('M, d Y');
    }

    public function furnish(): array
    {
        return (array) json_decode($this->furnish, true);
    }

    public function getPaymentMethodBadgeAttribute()
    {

        $verify = [
            'cash' => 'bx bxl-mastercard',
            'paystack' => 'bx bx-credit-card-alt',
        ];

        return $verify[$this->paymentMethod];
    }

    public function getLevelBadgeAttribute()
    {

        $level = [
            'new' => 'badge badge-soft-success',
            'renewal' => 'badge badge-soft-primary',
        ];

        return $level[$this->level];
    }

    public function getPaymentBadgeAttribute()
    {

        $verify = [
            '0' => 'Not Paid',
            '1' => 'Paid',
        ];

        return $verify[$this->isPaid];
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('uuid', 'like', $term)
                ->orWhere('name', 'like', $term)
                ->orWhere('email', 'like', $term)
                ->orWhere('phone', 'like', $term);
        });
    }

}