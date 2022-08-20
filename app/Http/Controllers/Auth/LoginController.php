<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function credentials(Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'is_active' => 1,'status' => 1];
    }
    protected function validateLogin(Request $request)
    {
        $fb_link = "<?php echo <a href='facebook.com'>Link</a> ?>";
        $this->validate($request, [
            $this->username() => 'exists:users,' . $this->username() . ',is_active,1,status,1',
            'password' => 'required|string',
        ], [
            $this->username() . '.exists' => 'Please verify your account on this email : "'. $request->{$this->username()}.'" and settle your payment on "facebook.com/CHAPOPOYCRIMINOLOGY" to active your account.'
        ]);


    }
}
