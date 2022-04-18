<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoginAdmin extends Model
{
    protected $table = 'admins';
    public $adminName;
    public $adminPass;
    public $adminEmail;
    public $adminAddress;
    public $adminImage;
    public $adminPhone;
    public $adminType;

    public function get_one()
    {
        $admins = DB::select("select * from $this->table
			where adminEmail = ? and adminPass = ?
			limit 1",[
            $this->adminEmail,
            $this->adminPass
        ]);
        return $admins;
    }
}
