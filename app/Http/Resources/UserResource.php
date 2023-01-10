<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'api_token' => $this->api_token,
            'profile_image_url' => $this->profile_image_url,
            'media_count' => $this->media_count,
            'notifications_count' => $this->notifications_count,
            'permissions_count' => $this->permissions_count,
            'read_notifications_count' => $this->read_notifications_count,
            'roles_count' => $this->roles_count,
            'tokens_count' => $this->tokens_count,
            'unread_notifications_count' => $this->unread_notifications_count,
        ];
    }
}
