<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumTopic extends Model
{
    use HasFactory;

    public function forumSubCategory(): BelongsTo
    {
        return $this->belongsTo(ForumSubCategory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function forumAnswers(): HasMany
    {
        return $this->hasMany(ForumAnswer::class);
    }
}
