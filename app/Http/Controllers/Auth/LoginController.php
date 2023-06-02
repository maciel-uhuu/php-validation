<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

  // /**
  //  * Attempt to log the user into the application.
  //  *
  //  * @param  \Illuminate\Http\Request  $request
  //  * @return bool
  //  */
  // protected function attemptLogin(Request $request)
  // {
  //   $result = $this->guard()->attempt(
  //     $this->credentials($request),
  //     $request->boolean('remember')
  //   );

  //   if (!$this->guard()->user()->can_access_account) {
  //     $this->guard()->logout();
  //     $result = false;
  //   }

  //   return $result;
  // }

  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function login(Request $request)
  {
    $this->validateLogin($request);

    // If the class is using the ThrottlesLogins trait, we can automatically throttle
    // the login attempts for this application. We'll key this by the username and
    // the IP address of the client making these requests into this application.
    if (
      method_exists($this, 'hasTooManyLoginAttempts') &&
      $this->hasTooManyLoginAttempts($request)
    ) {
      $this->fireLockoutEvent($request);

      return $this->sendLockoutResponse($request);
    }

    $login_attempt = $this->attemptLogin($request);

    // Failed to find an User
    if (!$login_attempt) {
      // If the login attempt was unsuccessful we will increment the number of attempts
      // to login and redirect the user back to the login form. Of course, when this
      // user surpasses their maximum number of attempts they will get locked out.
      $this->incrementLoginAttempts($request);

      return $this->sendFailedLoginResponse($request);
    }

    $user = $this->guard()->user();

    // Check if user account is active
    if (!$user->can_access_account) {
      // If the login attempt was unsuccessful because the account is disabled we will increment the number of attempts
      // to login and redirect the user back to the login form. Of course, when this
      // user surpasses their maximum number of attempts they will get locked out.
      $this->incrementLoginAttempts($request);

      $this->guard()->logout();

      return $this->sendDisabledAccountResponse($request);
    }

    if ($request->hasSession()) {
      $request->session()->put('auth.password_confirmed_at', time());
    }

    return $this->sendLoginResponse($request);
  }

  /**
   * Get the disabled account response instance.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Symfony\Component\HttpFoundation\Response
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  protected function sendDisabledAccountResponse(Request $request)
  {
    throw ValidationException::withMessages([
      'can_access_account' => [trans('auth.disabled_account')],
    ]);
  }
}
