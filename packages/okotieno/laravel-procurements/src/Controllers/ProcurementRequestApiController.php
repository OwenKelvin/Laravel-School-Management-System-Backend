<?php

namespace Okotieno\Procurement\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Okotieno\Procurement\Models\ProcurementRequest;
use Okotieno\Procurement\Request\ProcurementRequestCreateRequest;

class ProcurementRequestApiController extends Controller
{
   public function myRequests() {
       return User::find(auth()->id())->procurementRequests;
   }
}
