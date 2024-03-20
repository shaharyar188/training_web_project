<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use App\Models\user_meta;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\elementType;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        $user = Auth::user();

        $user_meta = DB::table('user_meta')->where('user_id', $user->id)
            ->join('users', 'users.id', "=", "user_meta.id")->first();

        return view('profile.edit', compact('user_meta'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {
        $updateUser = User::where('id', $id);
        $updateUser->update([
            'user_name' => $request->name,
            'email' => $request->email,
        ]);
        $update_user_meta = user_meta::where('user_id', Auth::user()->id)->update([
            'dob' => $request->dob,
            'street_address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'state' => $request->state,
            'country' => $request->country,
            'contact_no' => $request->contact_no,
        ]);
        if ($update_user_meta || $updateUser) {
            $message = 200;
        } else {
            $message = 300;
        }



        return response()->json([
            'message' => $message,
        ]);



        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
