<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentPin extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'pin'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
