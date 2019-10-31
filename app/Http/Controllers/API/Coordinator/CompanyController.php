<?php

namespace App\Http\Controllers\API\Coordinator;

use App\APIUtils;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('coordinator');
        $this->middleware('permission:company-list');
        $this->middleware('permission:company-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:company-edit', ['only' => ['edit', 'update']]);
    }

    public function get(Request $request)
    {
        $companies = Company::all()->sortBy('id');
        if (!empty($request->agreement) && APIUtils::is_date($request->agreement)) {
            $date = Carbon::createFromFormat("!Y-m-d", $request->agreement);

            $companies = array_values($companies->filter(function (Company $company) use ($date) {
                return $company->hasAgreementAt($date);
            })->toArray());
        }

        if (!empty($request->q)) {
            $companies = APIUtils::search(is_array($companies) ? $companies : $companies->toArray(), $request->q, ['name', 'fantasy_name', 'cpf_cnpj']);
        }

        return response()->json(
            $companies,
            200,
            [
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE);
    }

    public function getById($id)
    {
        $company = Company::findOrFail($id);

        return response()->json(
            $company,
            200,
            [
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE);
    }
}
