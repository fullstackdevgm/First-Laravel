<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    //use Authenticatable;
	protected $table = 'employees';
	protected $primaryKey  = 'id_kl';
	public $timestamps = true;
}
