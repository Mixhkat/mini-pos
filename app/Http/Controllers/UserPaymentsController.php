<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserPaymentsController extends Controller
{
    public function __construct()
	{
		$this->data['tab_menu'] = 'payments';
	}
	
    public function index($id)
    {
    	$this->data['user'] = User::findOrFail($id);

    	return view('users.payments.payments', $this->data);
    }

    public function store(PaymentRequest $request, $user_id)
    {
        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        if(Payment::create($formData)){
            Session::flash('message', 'Payment Added Successfully');
        }
        return redirect()->route('user.payments', ['id' => $user_id]);
    }

    public function destroy($user_id, $payment_id)
    {
        if(Payment::destroy($payment_id)){
            Session::flash('message', 'Payment Deleted Successfully');
        }
        return redirect()->route('user.payments', ['id' => $user_id]);
    }
}
