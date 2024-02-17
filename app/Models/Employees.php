<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

class Employees extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasTranslations,HasRoles;
    protected $guard = "admin";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'company_id',
        'added_by',
        'updated_by',
        'password',
        'is_owner',
    ];
    public $translatable = ['name'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function employeeDetails(){
        return $this->hasOne(EmployeeDetails::class,'employee_id','id');
    }
}
