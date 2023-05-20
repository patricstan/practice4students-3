<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'base_path',
        'placeholders',
        'html_path',
        'type',
        'fillable_by',
        'lang',
    ];
    protected $casts = [
        'placeholders' => 'array',
        'fillable_by' => 'array',
    ];

    // public function users(): BelongsToMany
    // {
    //     return $this->belongsToMany(User::class);
    // }
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)
            ->using(DocumentStudent::class)
            ->withTimestamps();;
    }

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class)
            ->using(CompanyDocument::class)
            ->withTimestamps();
    }
}
