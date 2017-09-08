<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group as ModelGroup;

class Group extends Controller
{
    public function getAll()
    {
    	$group = new ModelGroup();
    	$group = $group->getAllGroupActive();
    	return $group;
    }
}
