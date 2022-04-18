<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoginAccount extends Model
{
//    use HasFactory;
//    protected $fillable = [
//        'userName',
//        'userPass',
//        'userEmail',
//        'userAddress',
//        'userPhone',
//        'userType',
//        'userImage',
//    ];
    protected $table = 'accounts';
    public $userName;
    public $userPass;
    public $userEmail;
    public $userAddress;
    public $userPhone;
    public $userType;
    public $userImage;

    public function get_one()
    {
        $accounts = DB::select("select * from $this->table
			where userEmail = ? and userPass = ?
			limit 1",[
            $this->userEmail,
            $this->userPass
        ]);
        return $accounts;
    }
}
