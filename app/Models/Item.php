<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rarity()
    {
        return $this->belongsTo(Rarity::class);
    }
    public function source()
    {
        return $this->belongsTo(Source::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
