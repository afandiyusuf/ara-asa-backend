<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Assigner;
use App\Models\Assigner_data;
use App\Models\Group;

class AssignerController extends Controller
{
    public function create(Request $req)
    {
    	//cek username and uniqueid yang sama
    	$name = $req->input('name');
    	$uniquecode = $req->input('uniquecode');
    	$group_id = $req->input('group_id');

    	//cek group id
    	$group_found = Group::where('id',$group_id)->count();
    	if($group_found == 1)
    	{
    		$assigner_found = Assigner::where('name',$name)
    		->where('unique_id',$uniquecode)
    		->where('group_id',$group_id)->count();

    		if($assigner_found == 1)
    		{
    			return "user_sudah_pernah_didaftarkan";
    		}else{
    			$assigner = new Assigner();
    			$assigner->name = $name;
    			$assigner->unique_id = $uniquecode;
    			$assigner->group_id = $group_id;
    			$assigner->save();
    			
    			return $assigner->id;
    		}
    	}else{
    		return "group_not_found";
    	}
    }

    public function update(Request $req)
    {
    	//cek username and uniqueid yang sama
    	$assigner_id = $req->input('assigner_id');
    	$data = $req->input('data');

    	$assigner_data = new Assigner_data();
    	$assigner_data->param = "raw_json";
    	$assigner_data->data = $data;
    	$assigner_data->save();

    	return "input_success";
    }
}
