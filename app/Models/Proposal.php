<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Model for proposals table.
 *
 * @package App\Models
 * @property int id
 * @property int company_id
 * @property Carbon deadline
 * @property int schedule_id
 * @property int schedule_2_id
 * @property float remuneration
 * @property string description
 * @property string requirements
 * @property string benefits
 * @property string email
 * @property string subject
 * @property string phone
 * @property string other
 * @property int type
 * @property string observation
 * @property Carbon approved_at
 * @property string reason_to_reject
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property Company company
 * @property Schedule schedule
 * @property Schedule schedule2
 * @property Collection|Course[] courses
 * @property-read string formatted_phone
 */
class Proposal extends Model
{
    public const INTERNSHIP = 0;
    public const IC = 1;

    protected $fillable = [
        'company_id', 'deadline', 'schedule_id', 'schedule_2_id', 'remuneration', 'description', 'requirements',
        'benefits', 'email', 'subject', 'phone', 'other', 'type', 'observation', 'approved_at', 'reason_to_reject'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id' => 'integer',
        'schedule_id' => 'integer',
        'schedule_2_id' => 'integer',
        'type' => 'integer',

        'remuneration' => 'float',

        'deadline' => 'date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function schedule2()
    {
        return $this->belongsTo(Schedule::class, 'schedule_2_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'proposal_has_courses');
    }

    public function syncCourses($courses)
    {
        $this->courses()->sync($courses);
    }

    public function getFormattedPhoneAttribute()
    {
        $phone = $this->phone;
        if ($phone == null) {
            return null;
        }

        $ddd = substr($phone, 0, 2);
        $p1 = (strlen($phone) == 10) ? substr($phone, 2, 4) : substr($phone, 2, 5);
        $p2 = (strlen($phone) == 10) ? substr($phone, 6, 4) : substr($phone, 7, 4);
        return "($ddd) $p1-$p2";
    }

    public static function approved()
    {
        return static::where('approved_at', '<>', null)->where('deadline', '>=', Carbon::today())->get();
    }

    public static function pending()
    {
        return static::where('approved_at', '=', null)->where('deadline', '>=', Carbon::today())->where('reason_to_reject', '=', null)->get();
    }
}
