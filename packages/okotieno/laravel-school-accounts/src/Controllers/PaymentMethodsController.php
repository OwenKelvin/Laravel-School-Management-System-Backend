<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 2/10/2020
 * Time: 10:29 PM
 */

namespace Okotieno\SchoolAccounts\Controllers;


use App\Http\Controllers\Controller;
use App\Traits\hasActiveProperty;
use Illuminate\Http\Request;
use Okotieno\SchoolAccounts\Models\PaymentMethod;

class PaymentMethodsController extends Controller
{

    public function index(Request $request)
    {
        if($request->active == null) {

            return PaymentMethod::active()->get();
        }
        return PaymentMethod::all();
    }

    public function store()
    {

    }

    public function show()
    {

    }
}
