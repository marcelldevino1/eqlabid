<?php
namespace App\Exports;

use App\Models\UserProfile;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserProfilesExport implements FromView
{
    protected $start, $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $profiles = UserProfile::whereBetween('created_at', [$this->start, $this->end])->get();

        return view('exports.user_profiles_pdf', compact('profiles'));
    }
}
