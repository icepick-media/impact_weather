<?php 

namespace App\Laravel\Services;

use App\Laravel\Models\User;
use Illuminate\Validation\Validator;
use Auth, Hash;

class CustomValidator extends Validator {

    public function validateOldPassword($attribute, $value, $parameters){
        
        if($parameters){
            $user_id = $parameters[0];
            $user = User::find($user_id);
            return Hash::check($value,$user->password);
        }

        return FALSE;
    }

} 