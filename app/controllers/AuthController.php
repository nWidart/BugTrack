<?php  namespace Controllers;

use Illuminate\Routing\Controller;
use Sentry;
use Redirect;
use Bugtrack\Services\Validators\Login as LoginValidator;
use View;
use Input;

class AuthController extends Controller
{
    public function getLogin()
    {
        // Check if we're logged in already
        if ( Sentry::check() )
        {
            return Redirect::to('admin');
        }

        return View::make('login');
    }

    public function postLogin()
    {
        $validator = new LoginValidator;
        if ( $validator->passes() )
        {
            try {
                // Login credentials
                $credentials = array(
                    'email'    => Input::get('email'),
                    'password' => Input::get('password')
                );

                // Authenticate the user
                $user = Sentry::authenticate($credentials, false);

                return Redirect::to('admin')->with('success', 'Successfully logged in.');
            }
            catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                $error = 'Login field is required.';
            }
            catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                $error = 'Password field is required.';
            }
            catch (\Cartalyst\Sentry\Users\WrongPasswordException $e)
            {
                $error = 'Wrong password, try again.';
            }
            catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                $error = 'User was not found.';
            }
            catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
            {
                $error = 'User is not activated.';
            }

            // Redirect with sentry errors
            return Redirect::back()->withInput()->with('error', $error);
        }

        return Redirect::back()->withInput()->withErrors($validator->getErrors());
    }

    /**
     * Handles the logout
     *
     * @return Redirect To homepage
     */
    public function getLogout()
    {
        Sentry::logout();

        return Redirect::route('signin')->with('success', 'Logged out!');
    }
}