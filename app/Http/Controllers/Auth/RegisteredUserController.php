<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LibBarangay;
use App\Models\LibGender;
use App\Models\libSuffixName;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $genders = LibGender::all();
        $barangays = LibBarangay::all();
        $suffix_names = libSuffixName::all();
        return view('auth.register', ['suffix_names' => $suffix_names, 'genders' => $genders, 'barangays' => $barangays]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'main_church' => ['boolean'],
            'sub_church' => ['boolean'],
            'user' => ['boolean'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'exists:lib_genders,id'],
            'fixed_address' => ['nullable'],
            'address' => ['nullable'],
            'mobile_number' => ['required', 'numeric', 'digits:11'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Handling "other" fixed_address
        if ($validatedData['fixed_address'] == "other") {
            $validatedData['fixed_address'] = null;
        }

        // Create the user
        $user = User::create([
            'main_church' => $validatedData['main_church'],
            'sub_church' => $validatedData['sub_church'],
            'user' => $validatedData['user'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'middle_name' => $validatedData['middle_name'],
            'gender' => $validatedData['gender'],
            'fixed_address' => $validatedData['fixed_address'],
            'address' => $validatedData['address'],
            'mobile_number' => $validatedData['mobile_number'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Trigger Registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect to dashboard
        return redirect()->route('dashboard');
    }

}
