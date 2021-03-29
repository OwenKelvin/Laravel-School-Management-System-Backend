<?php

namespace Okotieno\Procurement\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Okotieno\ProcurementProcurementRequestCreateRequest;

class ProcurementRequestApiController extends Controller
{
  public function myRequests()
  {
    return User::find(auth()->id())->procurementRequests;
  }
}
