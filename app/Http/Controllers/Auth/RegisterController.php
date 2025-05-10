<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm($role)
    {
        abort_unless(in_array($role, ['owner', 'visitor']), 404);
        return view('auth.register', compact('role'));
    }

    public function register(RegisterRequest $request, $role): \Illuminate\Http\RedirectResponse
    {
        abort_unless(in_array($role, ['owner', 'visitor']), 404);

        $user = User::create([
            'name' => $request->validated()['name'],
            'email' => $request->validated()['email'],
            'password' => Hash::make($request->validated()['password']),
        ]);

        $user->assignRole(ucfirst($role)); // z. B. 'Owner' oder 'Visitor'

        auth()->login($user);

        return redirect()->route($role . '.dashboard'); // z. B. owner.dashboard
    }
}
