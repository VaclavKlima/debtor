<?php

namespace App\Models;

use App\Traits\HasCreatedBy;
use App\Traits\HasUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order extends Model implements HasMedia
{
    use SoftDeletes;
    use HasCreatedBy;
    use HasUpdatedBy;
    use InteractsWithMedia;

    protected $fillable = [
        'owner_id',
        'title',
    ];

    /**
     * Relations
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updated_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Media
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('order_image')
            ->singleFile();
    }


}
