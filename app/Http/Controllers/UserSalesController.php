<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserSalesController extends Controller
{
	public function __construct()
	{
		$this->data['tab_menu'] = 'sales';
	}
	
    public function index($id)
    {
    	$this->data['user'] = User::findOrFail($id);

    	return view('users.sales.sales', $this->data);
    }
}
