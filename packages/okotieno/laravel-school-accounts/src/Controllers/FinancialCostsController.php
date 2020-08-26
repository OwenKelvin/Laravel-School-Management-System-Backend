<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 2/10/2020
 * Time: 10:29 PM
 */

namespace Okotieno\SchoolAccounts\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\SchoolAccounts\Models\FinancialCost;

class FinancialCostsController extends Controller
{
    public function index()
    {
        return FinancialCost::all();
    }

    public function store(Request $request)
    {
        FinancialCost::saveCosts($request);
        return [
            'saved' => true,
            'message' => 'Successfully saved cost items',
        ];
    }

    /**
     * @param FinancialCost $financialCost
     * @return array
     * @throws \Exception
     */
    public function destroy(FinancialCost $financialCost) {
        $name = $financialCost->name;
        $financialCost->delete();
        return [
            'saved' => true,
            'message' => 'Successfully deleted Cost "'.$name.'"'
        ];
    }
}
