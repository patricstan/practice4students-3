<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Student extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'specialization',
        'about',
        'skills',
        'last_year_grade',
        'foreign_languages',
        'hobbies',
        'education',
        'experience',
        'projects',
        'completed_practice'
    ];

    protected $casts = [
        'skills' => 'array',
        'foreign_languages' => 'array',
        'hobbies' => 'array',
        'education' => 'array',
        'experience' => 'array',
        'projects' => 'array'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offers(): BelongsToMany
    {
        return $this->belongsToMany(Offer::class)
            ->using(OfferStudent::class)
            ->withTimestamps();
    }

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class)
            ->using(DocumentStudent::class)
            ->withTimestamps();;
    }

    public function pin(): HasOne
    {
        return $this->hasOne(StudentPin::class);
    }
}
