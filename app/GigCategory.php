<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GigCategory extends Model
{
    protected $guarded = [];

    public function getParent()
    {
        $parent = $this->where('id',$this->parent_id)->first();
        if($parent){
            return $parent->name;
        }else{
            return 'No Parent';
        }
    }

    public function isparent($id)
    {
        $check = $this->where('id',$id)->where('parent_id',0)->first();
        if($check){

            return true;

        }else{

            return false;
        }
    }

    // public function parent() {
    //     return $this->belongsToOne(static::class, 'parent_id');
    // }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(static::class, 'parent_id')->orderBy('id', 'asc');
    }
}
