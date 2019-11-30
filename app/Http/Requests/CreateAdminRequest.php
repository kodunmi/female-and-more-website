<?php

namespace App\Http\Requests;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
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

        ];
    }

    public function uploadAdminImage(){

        $uploadedFile = $this->image;
        $this->fileName =  str_slug($this->name).'.'.$uploadedFile->getClientOriginalExtension();
        $uploadedFile->storePubliclyAs('public/admins',$this->fileName);

        return $this;
    }

    public function storeAdmin(){
        $admin = new Admin;
        $admin->name = $this->name;
        $admin->email = $this->email;
        $admin->department = $this->department;
        $admin->position = $this->position;
        $admin->image = 'storage/admins/'.$this->fileName;
        $admin->password = Hash::make($this->password);
        $admin->save();

        return $this;
    }

    public function logAdminIn(){
        Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password]);
    }

    public function validateAdmin(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed',
            'department' => 'required',
            'position' => 'required',
            'image' => 'image|required|mimes:jpg,jpeg,png'
        ]);

        return $this;
    }
}
