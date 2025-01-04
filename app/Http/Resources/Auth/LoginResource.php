<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name ?? '',
            'email' => $this->email ?? '',
            'role' => $this->role ?? '',
            'image' => $this->full_image_path ?? '',
        ];
    }
}
