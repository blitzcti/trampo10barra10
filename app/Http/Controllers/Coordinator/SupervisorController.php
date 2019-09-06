<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coordinator\StoreSupervisor;
use App\Http\Requests\Coordinator\UpdateSupervisor;
use App\Models\Company;
use App\Models\Supervisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('coordinator');
        $this->middleware('permission:companySupervisor-list');
        $this->middleware('permission:companySupervisor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:companySupervisor-edit', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $supervisors = Supervisor::all();
        return view('coordinator.company.supervisor.index')->with(['supervisors' => $supervisors]);
    }

    public function indexByCompany($id)
    {
        $company = Company::findOrFail($id);
        $supervisors = $company->supervisors;
        return view('coordinator.company.supervisor.index')->with(['company' => $company, 'supervisors' => $supervisors]);
    }

    public function create()
    {
        $companies = Company::all()->where('active', '=', true)->sortBy('id');
        $c = request()->c;
        return view('coordinator.company.supervisor.new')->with(['companies' => $companies, 'c' => $c]);
    }

    public function edit($id)
    {
        $supervisor = Supervisor::findOrFail($id);
        $companies = Company::all()->where('active', '=', true)->merge([$supervisor->company])->sortBy('id');

        return view('coordinator.company.supervisor.edit')->with([
            'supervisor' => $supervisor, 'companies' => $companies,
        ]);
    }

    public function store(StoreSupervisor $request)
    {
        $supervisor = new Supervisor();
        $params = [];

        $validatedData = (object)$request->validated();

        $log = "Novo supervisor";
        $log .= "\nUsuário: " . Auth::user()->name;

        $supervisor->name = $validatedData->supervisorName;
        $supervisor->email = $validatedData->supervisorEmail;
        $supervisor->phone = $validatedData->supervisorPhone;
        $supervisor->company_id = $validatedData->company;

        $saved = $supervisor->save();
        $log .= "\nNovos dados: " . json_encode($supervisor, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        if ($saved) {
            Log::info($log);
        } else {
            Log::error("Erro ao salvar supervisor");
        }

        $params['saved'] = $saved;
        $params['message'] = ($saved) ? 'Salvo com sucesso' : 'Erro ao salvar!';

        return redirect()->route('coordenador.empresa.supervisor.index')->with($params);
    }

    public function update($id, UpdateSupervisor $request)
    {
        $supervisor = Supervisor::findOrFail($id);
        $params = [];

        $validatedData = (object)$request->validated();

        $log = "Alteração de supervisor";
        $log .= "\nUsuário: " . Auth::user()->name;
        $log .= "\nDados antigos: " . json_encode($supervisor, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $supervisor->name = $validatedData->supervisorName;
        $supervisor->email = $validatedData->supervisorEmail;
        $supervisor->phone = $validatedData->supervisorPhone;
        $supervisor->company_id = $validatedData->company;

        $saved = $supervisor->save();
        $log .= "\nNovos dados: " . json_encode($supervisor, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        if ($saved) {
            Log::info($log);
        } else {
            Log::error("Erro ao salvar supervisor");
        }

        $params['saved'] = $saved;
        $params['message'] = ($saved) ? 'Salvo com sucesso' : 'Erro ao salvar!';

        return redirect()->route('coordenador.empresa.supervisor.index')->with($params);
    }
}
