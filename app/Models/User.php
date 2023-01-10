<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\IbanService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use HasPermissions;
    use InteractsWithMedia;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'bank_account_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relations
     */

    /**
     * Attributes
     */
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn(): string => "{$this->first_name} {$this->last_name}",
            set: fn(string $value): array => [
                $this->first_name = explode(' ', $value, 2)[0],
                $this->last_name = explode(' ', $value, 2)[1] ?? null,
            ],
        );
    }

    public function profileImageUrl(): Attribute
    {
        $media = $this->getFirstMedia('profile_image');

        return Attribute::make(
            get: static fn(): string => $media ? $media->getUrl('thumb') : asset('media/avatars/avatar0.jpg')
        );
    }

    public function iban(): Attribute
    {
        return Attribute::make(
            get: fn(): string => (new IbanService($this->bank_account_number))->getIban(),
        );
    }

    /**
     * Register media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('user_image')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);
    }
}
