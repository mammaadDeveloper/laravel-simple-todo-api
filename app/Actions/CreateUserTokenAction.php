<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Validation\UnauthorizedException;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateUserTokenAction
{
    use AsAction;

    public function handle(array $data): Collection | null
    {
        $user = User::where('email', $data['email'])->first();

        if (! $user)
            throw new UnauthorizedException('Invalid credentials!');

        $token = $user->createToken($data['token'])->plainTextToken;

        return collect([
            'token'=> $token,
            'user' => $user
        ]);
    }
}
