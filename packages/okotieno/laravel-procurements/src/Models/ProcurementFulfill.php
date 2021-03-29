<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 1/10/2020
 * Time: 8:05 PM
 */

namespace Okotieno\Procurement\Models;


use Illuminate\Database\Eloquent\Model;

class ProcurementFulfill extends Model
{
  protected $fillable = [
    'procurement_tender_id',
    'entered_by',
    'fulfilled',
    'comment'
  ];
}
