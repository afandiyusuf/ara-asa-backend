<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Group extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'groups';
    protected $primaryKey = 'id';
    // public $timestamps = false;
     protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getStatus()
    {
        if($this->is_active ==1)
        {
            return "AKTIF";
        }else{
            return "TIDAK AKTIF";
        }
    }

    public function getButtonAction()
    {
        if($this->is_active == 1)
        {
            return "<a href='".url('admin/group/toogle_active')."/".$this->id."' type='button' class='btn btn-danger'>SET NONAKTIF </a>";
        }else{
            return "<a href='".url('admin/group/toogle_active')."/".$this->id."' type='button' class='btn btn-primary'>SET ACTIVE </a>";
        }
    }

    public function toggleActive()
    {  
        $this->update(["is_active"=>!$this->is_active]);
    }

    public function getAllGroupActive()
    {
        return $this->where('is_active',1)->get();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
