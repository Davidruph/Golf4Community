<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AdminNewMemberMail;
use Illuminate\Support\Facades\DB;
use App\Mail\MemberVerificationMail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        $countries = DB::table('countries')->get();
        $profession_types = DB::table('profession_type')->get();
        $golf_courses = DB::table('golf_courses')->orderBy('course_name', 'asc')->pluck('course_name', 'id');
        // dd($golf_courses);
        $user_types = DB::table('user_type')->get();

        // dd($countries);
        return view('auth.register', compact('countries', 'profession_types', 'golf_courses', 'user_types'));
    }

    public function next(Request $request)
    {
        $step = session('step', 1);

        // Validate each step
        if ($step === 1) {
            $request->validate([
                'first_name' => ['required', 'regex:/^[A-Za-z\s\-]+$/'],
                'last_name' => ['required', 'regex:/^[A-Za-z\s\-]+$/'],
                'email' => ['required', 'email', 'max:255', 'unique:members,user_email'],
                'username' => ['required', 'string', 'max:255', 'unique:members,username'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ], [
                'first_name.regex' => 'First name should only contain letters.',
                'last_name.regex' => 'Last name should only contain letters.',
                'email.email' => 'Email must be a valid email address.',
                'username.unique' => 'Username is already taken.',
            ]);
        } elseif ($step === 2) {
            $request->validate([
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'zip' => 'required',
            ]);
        } elseif ($step === 3) {
            $request->validate([
                'profession_type' => 'required',
                'user_type' => 'required',
                'home_golf_course' => 'required',
                'golf_score' => 'required',
                'play_type' => 'required|array|min:1',
                'agree' => 'accepted',
            ]);
        }

        // Save progress
        session()->put('form_data', array_merge(session('form_data', []), $request->only([
            'first_name',
            'last_name',
            'email',
            'username',
            'country',
            'state',
            'city',
            'zip',
            'password',
            'profession_type',
            'user_type',
            'home_golf_course',
            'golf_score',
            'play_type',
            'agree',
        ])));

        // Next step or finish
        if ($step < 3) {
            session(['step' => $step + 1]);
            return back();
        }

        // Final submission
        $data = session('form_data');
        $token = rand();
        $data['token'] = $token;

        // dd($data);

        DB::table('members')->insert([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_email' => $data['email'],
            'username' => $data['username'],
            'userpassword' => bcrypt($data['password']),
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'zip_code' => $data['zip'],
            'profession_type' => $data['profession_type'],
            'usertype' => $data['user_type'],
            'golf_scores' => $data['golf_score'],
            'course_name_id' => $data['home_golf_course'],
            'play_type' => implode(',', $data['play_type']),
            'token' => $data['token'],
            "profile_visibility" => 'Yes',
            "terms" => $data['agree'] == 'on' ? 1 : 0,
            "address" => $data['address'] ?? '',
        ]);

        $fullname = $data['first_name'] . ' ' . $data['last_name'];

        // Send user verification email
        Mail::to($data['email'])->send(new MemberVerificationMail(
            $fullname,
            $data['email'],
            $data['token']
        ));

        // Send admin notification
        Mail::to('tester.donotreply.tester@gmail.com')->send(new AdminNewMemberMail(
            $data['username'],
            $data['email']
        ));


        session()->forget(['form_data', 'step']);
        return redirect()->route('login')->with('success', 'Membership created successfully!, an email has been sent to your email for verification.');
    }

    public function prev()
    {
        $step = session('step', 1);
        if ($step > 1) session(['step' => $step - 1]);
        return back();
    }

    public function getStates($countryId)
    {
        $states = DB::table('states')->where('country_id', $countryId)->get();
        return response()->json($states);
    }

    public function getCities($stateId)
    {
        $cities = DB::table('cities')->where('state_id', $stateId)->get();
        return response()->json($cities);
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function login(Request $request)
    {
        // Handle user login
    }

    public function register(Request $request)
    {
        // Handle user registration
    }

    public function logout(Request $request)
    {
        // Handle user logout
    }

    public function userConfirmation()
    {
        // Handle user email confirmation
        $token = $_GET['token'] ?? null;
        $email = $_GET['email'] ?? null;

        if ($token && $email) {
            $member = DB::table('members')->where('user_email', $email)->where('token', $token)->first();
            if ($member) {
                DB::table('members')->where('id', $member->id)->update(['verified' => 1, 'token' => null]);
                return redirect()->route('login')->with('success', 'Your email has been verified. You can now log in.');
            } else {
                return redirect()->route('login')->with('error', 'Invalid verification link.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid verification link.');
        }
    }
}
