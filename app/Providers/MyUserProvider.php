<?php

namespace App\Providers;
use App\User; 
use Carbon\Carbon;
use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MyUserProvider implements UserProvider {

/**
 * Retrieve a user by their unique identifier.
 *
 * @param  mixed $identifier
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
public function retrieveById($identifier)
{
    // TODO: Implement retrieveById() method.


    $qry = user::where('id_kl','=',$identifier);

    if($qry->count() >0)
    {
        $user = $qry->select('id_kl', 'gebrnm_kl', 'vl_kl', 'email_kl', 'pw_kl', 'tel_kl', 'sexe_kl', 'id_bd', 'premium_kl')->first();

        $attributes = array(
            'id_kl' => $user->id_kl,
            'gebrnm_kl' => $user->gebrnm_kl,
            'pw_kl' => $user->pw_kl,
            'email_kl' => $user->email_kl,
            'vl_kl' => $user->vl_kl,
        );

        return $user;
    }
    return null;
}

/**
 * Retrieve a user by by their unique identifier and "remember me" token.
 *
 * @param  mixed $identifier
 * @param  string $token
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
public function retrieveByToken($identifier, $token)
{

    // TODO: Implement retrieveByToken() method.
    $qry = user::where('id_kl','=',$identifier)->where('remember_token','=',$token);

    if($qry->count() >0)
    {
        $user = $qry->select('id_kl', 'gebrnm_kl', 'vl_kl', 'email_kl', 'pw_kl', 'tel_kl', 'sexe_kl', 'id_bd', 'premium_kl')->first();

        $attributes = array(
            'id_kl' => $user->id_kl,
            'gebrnm_kl' => $user->gebrnm_kl,
            'pw_kl' => $user->pw_kl,
            'email_kl' => $user->email_kl,
            'vl_kl' => $user->vl_kl,
        );

        return $user;
    }
    return null;



}

/**
 * Update the "remember me" token for the given user in storage.
 *
 * @param  \Illuminate\Contracts\Auth\Authenticatable $user
 * @param  string $token
 * @return void
 */
public function updateRememberToken(Authenticatable $user, $token)
{
    // TODO: Implement updateRememberToken() method.
    $user->setRememberToken($token);

    $user->save();

}

/**
 * Retrieve a user by the given credentials.
 *
 * @param  array $credentials
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
public function retrieveByCredentials(array $credentials)
{
    
    // TODO: Implement retrieveByCredentials() method.
    $qry = user::where('email_kl','=',$credentials['email_kl']);

    if($qry->count() > 0)
    {
        $user = $qry->select('id_kl', 'gebrnm_kl', 'vl_kl', 'email_kl', 'pw_kl', 'tel_kl', 'sexe_kl', 'id_bd', 'premium_kl')->first();
        return $user;
    }

    return null;


}

/**
 * Validate a user against the given credentials.
 *
 * @param  \Illuminate\Contracts\Auth\Authenticatable $user
 * @param  array $credentials
 * @return bool
 */
public function validateCredentials(Authenticatable $user, array $credentials)
{
    // TODO: Implement validateCredentials() method.
    // we'll assume if a user was retrieved, it's good

    // DIFFERENT THAN ORIGINAL ANSWER


    if($user->getAuthemail() == $credentials['email_kl'] && md5($credentials['pw_kl']) == $user->getAuthPassword())//$user->getAuthPassword() == md5($credentials['password'].\Config::get('constants.SALT')))
    {


        //$user->last_login_time = Carbon::now();
        //exit("sadfasdfa");

         $user->save();

         return true;
    }
    return false;


}
}