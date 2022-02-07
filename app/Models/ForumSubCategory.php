<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumSubCategory extends Model
{
    use HasFactory;

    public function forumCategory(): BelongsTo
    {
        return $this->belongsTo(ForumCategory::class);
    }

    public function forumTopics(): HasMany
    {
        return $this->hasMany(ForumTopic::class);
    }
}
