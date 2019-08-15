<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class OAuthClient extends Model {

    public $table = 'oauth_clients';
    protected $fillable = ['user_id', 'name', 'secret','redirect','personal_access_client','password_client','revoked'];
   
   
     

}