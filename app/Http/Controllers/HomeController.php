<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Employ;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    use PasswordValidationRules;
    public function index()
    {
        return view('front.home');
    }

    public function adminindex()
    {
        return view('front.admin');
    }


    public function inviteUser(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employ'],
        ]);
        $employ = Employ::create(['email' => $request->email]);
        $sendTo = $request->email;
        $id = $employ->id;
        $link = route('save-user',$id);
        Mail::send([], [], function ($message) use ($link, $sendTo) {
            $message->to($sendTo, 'neel')
                ->subject('test mail')
                ->setBody('<a href="' . $link . '" target="blank"> ' . $link . ' </a>', 'text/html');
        });

        return redirect(route('admin.home'))->with('success', 'invitation sent successfully');
    }

    public function saveuser(Request $request, Employ $employ)
    {
        if ($request->method() == 'GET') {
            return view('front.savepassword', compact('employ'));
        } else {
            $request->validate([
                'password' => $this->passwordRules()
            ]);
            if ($employ->is_created == 1)
                abort(500);

            $employ->update(['password' => Hash::make($request->password), 'is_created' => 1]);
            return redirect(route('user.login'))->with('success', 'login to continue');
        }
    }
}
