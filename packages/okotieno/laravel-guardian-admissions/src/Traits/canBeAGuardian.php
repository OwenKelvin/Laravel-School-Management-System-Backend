<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 9/13/2019
 * Time: 10:13 PM
 */

namespace Okotieno\GuardianAdmissions\Traits;


use Okotieno\GuardianAdmissions\Models\Guardian;

trait canBeAGuardian
{
  public function guardian()
  {
    return $this->hasOne(Guardian::class);
  }
}
