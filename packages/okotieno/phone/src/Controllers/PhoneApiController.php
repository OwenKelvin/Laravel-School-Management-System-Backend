<?php

namespace Okotieno\Phone\Controllers;

use App\Http\Controllers\Controller;

class PhoneApiController extends Controller
{
  public function getAllowedCountries()
  {
    return ['ke', 'ug', 'tz', 'ca', 'us', 'rw'];
  }
}
