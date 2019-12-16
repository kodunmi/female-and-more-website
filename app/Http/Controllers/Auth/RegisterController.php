<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Level;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * stores user referrer id into session
     *
     * @return null
     */
    public function storeReforrerId($request){
        if($request->has('ref')){
            $userId = User::where('affiliate_id',$request->query('ref'))->get();
            session(['user_id' => $userId]);
        }
    }

    /**
     * this method updates referrer's score in the database
     *
     * @return null
     */
    public function updateReferrerScore(){
        if(session()->has('user_id')){
            User::find(session()->get('user_id'))->first()->increment('referral_score', 5);
        }
    }

    /**
     * this method updates total score in the database
     *
     * @return null
     */
    public function updateTotalScore(){
        if(session()->has('user_id')){
            User::find(session()->get('user_id'))->first()->increment('total_score', 5);
        }
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        $this->storeReforrerId($request);

        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'alpha_num', 'max:10','unique:users'],
            'country' => ['required', 'string', 'max:255'],
            'dob' => 'required',
            'state' => ['required', 'string', 'max:255'],
            'goal-to-greatness' => ['required', 'string', 'max:80'],
            'image' => ['mimes:jpeg,png,jpg', 'required', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[

            'image.uploaded' => 'fail to upload your image,  image maximum size is 80kb',
            'username.alpha_num' => 'the user name can only contain alphabet and numbers no space allowed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $season = Level::where('level_number', 1)->value('season_number');
        $this->updateReferrerScore();
        $this->updateTotalScore();


        $uploadedFile = $data['image'];
        $fileName =  $data['username'].'.'.$uploadedFile->getClientOriginalExtension();
        $uploadedFile->storePubliclyAs('public/users',$fileName);

        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'country' => $data['country'],
            'dob' => $data['dob'],
            'state' => $data['state'],
            'goal_to_greatness' => $data['goal-to-greatness'],
            'image' => $fileName,
            'season_number' => $season,
            'password' => Hash::make($data['password']),
        ]);
    }

}
