<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'user_id';

    protected $table = 'users';

    protected $dates = ['date_of_birth'];

    protected $guarded = [];

    protected $hidden = ['user_id'];

    public function address(){
        return $this->hasOne(UserAddress::class,'user_id','user_id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'user_id','user_id');
    }

    public function scopeActive($query){
        return $query->where('status',1);
    }
    
    public function getDateOfBirthFormatedAttribute(){   //date_of_birth accesser then we added Formated
        return date('d-M-Y',strtotime($this->date_of_birth));
    }

    public function setDateOfBirthAttribute($value){
        $this->attributes['date_of_birth'] = date('Y-m-d',strtotime($value));
    }

    public function getStatusTextAttribute(){
        if($this->status == 1) return "Active";
        else return "Inactive";
    }
    protected $appends = ['date_of_birth_formated','status_text'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
