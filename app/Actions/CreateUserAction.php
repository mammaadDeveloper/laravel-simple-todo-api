<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateUserAction
{
    use AsAction;

    public function handle(array $data): User | null
    {
        DB::beginTransaction();
        try{
            $user = User::create($data);
            DB::commit();
            return $user;
        }
        catch (\Exception $e){
            DB::rollBack();
            return null;
        }
    }
}
