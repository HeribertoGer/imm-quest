<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'last_name',
        'nationalities',
        'vtiger_contact_id',
        //'mobile_phone',
        'lead_source',
        'watsapp_no',
        'refered_by',
        'email',
        'assigned_to',
        'qualified_for',
        //'secondary_email',
        'email_out_op',
        'lead_status_id',
        'lead_stage_id',
        'care_agent',
        'phone',
        'fax',
        'has_passport',
        'passport_expiration_date',
        'rating',
        'watsapp_update_option',
        'agent_id',
        'description',
        'password',
        'refresh_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contact_address()
    {
        return $this->belongsTo(UserAddres::class, 'contactaddressid');
    }
    public function contact_details()
    {
        return $this->hasOne(UserDetail::class, 'contactid');
    }
    public function contact_cf()
    {
        return $this->hasOne(UserCF::class, 'contactid');
    }
    public function contact_sub_details()
    {
        return $this->hasOne(UserSubDetail::class, 'contactsubscriptionid');
    }
}
