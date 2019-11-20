<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function validateAdmin(){
        $this->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        return $this;
    }

    
    public function isAdmin(){
        $this->remember_me = $this->has('remember_me') ? true : false;
        if(Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password],$this->remember_me)){
            return true;
        }else{
            return false;
        };

        
    }
}
