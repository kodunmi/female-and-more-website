<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        //$user = User::find(Auth::id());

        $url = url('/register/');

        // auth()->user()->generateAffiliateId();

        //  $link = $user->getAffiliateLink($url);

        // dd(auth()->user()->referrals()->count());

        return view('frontend.pages.dashboard')->with(['url' => $url]);
    }

    public function profileUpdate(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $validation = Validator::make(
                $request->all(),
                [
                    'image' => ['mimes:jpeg,png,jpg', 'max:50']
                ],
                [
                    'image.uploaded' => 'fail to upload your image,  image maximum size is 80kb'
                ]
            );
            if ($validation->passes()) {

                $imageUrl = User::where('id',$id)->value('image');
                $username = User::where('id',$id)->value('username');

                Storage::delete('public/users/'.$imageUrl);

                $uploadedFile = $request->file('image');
                $fileName =  $username.'.'.$uploadedFile->getClientOriginalExtension();
                $uploadedFile->storePubliclyAs('public/users',$fileName);

                $user = User::find($id);
                $user->name = $request->name;
                $user->country = $request->country;
                $user->state = $request->state;
                $user->dob = $request->dob;
                $user->goal_to_greatness = $request->goal_to_greatness;
                $user->save();

                return response()->json([
                    'message'   => 'uploaded successfully',
                ], 200);
            } else {
                return response()->json([
                    'error'   => $validation->errors()->all(),
                ], 422);
            }
        } else {
            $user = User::find($id);
            $user->name = $request->name;
            $user->country = $request->country;
            $user->state = $request->state;
            $user->dob = $request->dob;
            $user->goal_to_greatness = $request->goal_to_greatness;
            $user->save();

            return response()->json([
                'message'   => 'uploaded successfully',
            ], 200);
        }
    }
}
