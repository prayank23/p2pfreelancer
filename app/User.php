<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\FullTextSearch;

class User extends Authenticatable
{
    use Notifiable,FullTextSearch;

    const consultant = 0;
    const lookingForSupport = 1;


    /**
     * The columns of the full text index
     */
    protected $searchable = [
        'skills',
        'experience',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username' , 'email', 'password', 'first_name', 'last_name', 'phone', 'skills', 'experience', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getName()
    {
        if($this->last_name && $this->last_name !=$this->first_name){

            return $this->first_name.' '.$this->last_name;
        }else{
            return $this->name;
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getSkills()
    {
        return $this->skills;
    }

    public function getExperience()
    {
        return $this->experience;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
