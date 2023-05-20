<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'is_paid',
        'salary',
        'currency',
        'is_remote',
        'city',
        'skills',
        'description',
        'applied',
        'accepted',
        'is_available',
        'company_id'
    ];

    protected $casts = [
        'skills' => 'array'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)
            ->using(OfferStudent::class)
            ->withTimestamps();
    }
}
