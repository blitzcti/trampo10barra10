<?php

namespace App\Http\Controllers;

use App\Auth;
use App\Models\Course;
use App\Models\Internship;
use App\Models\Proposal;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    public function frontPage()
    {
        return view('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->password_change_at == null) {
            return redirect()->route('usuario.senha.editar');
        }

        $data = ['user' => $user];

        if ($user->isCoordinator()) {
            $strCourses = $user->coordinator_courses_name;
            $cIds = Auth::user()->coordinator_courses_id;

            $data['strCourses'] = $strCourses;
            $data['requiringFinish'] = Internship::requiringFinish()->filter(function ($internship) use ($cIds) {
                return in_array($internship->student->course_id, $cIds);
            })->sortBy('student.nome');

            $data['proposals'] = Proposal::pending()
                ->filter(function (Proposal $proposal) use ($cIds) {
                    $ret = false;

                    /* @var $course Course */
                    foreach ($proposal->courses as $course) {
                        if (!$ret) {
                            $ret = in_array($course->id, $cIds);
                        }
                    }

                    return $ret;
                })->sortBy('id');
        } else if ($user->isCompany()) {
            $company = $user->company;
            $data['proposals'] = $company->proposals
                ->where('approved_at', '=', null)
                ->where('reason_to_reject', '=', null)
                ->where('deadline', '>=', Carbon::today());
            $data['proposalsApproved'] = $company->proposals
                ->where('approved_at', '<>', null);
            $data['propalsRejected'] = $company->proposals
                ->where('reason_to_reject', '<>', null)
                ->where('approved_at', '=', null);
        } else if ($user->isStudent()) {
            $data['proposals'] = Proposal::approved();
        }

        return view('home')->with($data);
    }

    public function notifications()
    {
        $user = Auth::user();
        $notifications = $user->notifications;

        return view('user.notifications')->with(['notifications' => $notifications]);
    }
}
