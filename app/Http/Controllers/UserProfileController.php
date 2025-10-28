<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\UserProfilesExport;



class UserProfileController extends Controller
{
public function index()
{
$profiles = UserProfile::with('user')->paginate(10);
return view('user_profiles.index', compact('profiles'));
}


public function create()
{
return view('user_profiles.create');
}


public function store(Request $request)
{
    $validated = $request->validate([
        'full_name' => 'required|string|max:150',
        'email' => 'nullable|email|max:150',
        'national_id' => 'required|string|max:20|unique:user_profiles,national_id',
        'family_card_number' => 'nullable|string|max:20',
        'phone_number' => 'nullable|string|max:20',
        'birth_place' => 'nullable|string|max:100',
        'birth_date' => 'nullable|date',
        'gender' => 'nullable|in:male,female,other',
        'nationality' => 'nullable|string|max:100',
        'address' => 'nullable|string|max:255',
        'province' => 'nullable|string|max:100',
        'city_district' => 'nullable|string|max:100',
        'sub_district' => 'nullable|string|max:100',
        'village' => 'nullable|string|max:100',
        'rt' => 'nullable|string|max:5',
        'rw' => 'nullable|string|max:5',
        'postal_code' => 'nullable|string|max:10',
        'father_name' => 'nullable|string|max:150',
        'mother_name' => 'nullable|string|max:150',
        'siblings_count' => 'nullable|integer|min:0',
        'child_number' => 'nullable|integer|min:1',
        'bio' => 'nullable|string|max:1000',
    ]);

    $validated['is_stats'] = 0;
    UserProfile::create($validated);

    return redirect()
        ->route('user_profiles.index')
        ->with('success', 'User profile has been created successfully.');
}



public function show(UserProfile $userProfile)
{
return view('user_profiles.show', compact('userProfile'));
}


public function edit(UserProfile $userProfile)
{
return view('user_profiles.edit', compact('userProfile'));
}
public function update(Request $request, UserProfile $userProfile)
{
    $validated = $request->validate([
        'full_name'          => 'required|max:150',
        'national_id'        => 'required|unique:user_profiles,national_id,' . $userProfile->id,
        'email'              => 'nullable|email',
        'family_card_number' => 'nullable|string|max:20',
        'phone_number'       => 'nullable|string|max:20',
        'birth_place'        => 'nullable|string|max:100',
        'birth_date'         => 'nullable|date',
        'gender'             => 'nullable|in:male,female,other',
        'nationality'        => 'nullable|string|max:100',
        'address'            => 'nullable|string',
        'province'           => 'nullable|string|max:100',
        'city_district'      => 'nullable|string|max:100',
        'sub_district'       => 'nullable|string|max:100',
        'village'            => 'nullable|string|max:100',
        'rw'                 => 'nullable|string|max:5',
        'rt'                 => 'nullable|string|max:5',
        'postal_code'        => 'nullable|string|max:10',
        'father_name'        => 'nullable|string|max:150',
        'mother_name'        => 'nullable|string|max:150',
        'siblings_count'     => 'nullable|integer',
        'child_number'       => 'nullable|integer',
        'bio'                => 'nullable|string',
    ]);

    // pastikan user_id tetap milik user yang sedang login (opsional)
    $validated['user_id'] = $userProfile->user_id; 

    $userProfile->update($validated);

    return redirect()->route('user_profiles.index')
        ->with('success', 'Profile updated.');
}
public function import(Request $request)
{
    $request->validate([
        'import_file' => 'required|file|mimes:xlsx,csv'
    ]);

    // Logic for importing goes here (e.g. using Laravel Excel)
    // Excel::import(new UserProfilesImport, $request->file('import_file'));

    return back()->with('success', 'Import successful.');
}

public function downloadTemplate()
{
    $file = public_path('templates/user_profiles_template.xlsx'); // Simpan file template di public/templates/

    if (!file_exists($file)) {
        abort(404, 'Template not found.');
    }

    return Response::download($file, 'user_profiles_template.xlsx');
}

public function destroy(UserProfile $userProfile)
{
$userProfile->delete();
return redirect()->route('user-profiles.index')->with('success', 'Profile deleted.');
}

public function export(Request $request, $format)
{
    $start = $request->start_date;
    $end = $request->end_date;

    $profiles = UserProfile::whereBetween('created_at', [$start, $end])->get();

    if ($format === 'pdf') {
        $pdf = PDF::loadView('exports.user_profiles_pdf', compact('profiles'));
        return $pdf->download('user_profiles.pdf');
    }

    if ($format === 'excel') {
        return Excel::download(new UserProfilesExport($start, $end), 'user_profiles.xlsx');
    }

    if ($format === 'word') {
        $html = view('exports.user_profiles_pdf', compact('profiles'))->render();
        return response()->streamDownload(function () use ($html) {
            echo $html;
        }, 'user_profiles.doc', [
            'Content-Type' => 'application/msword',
        ]);
    }

    return back()->with('error', 'Invalid format');
}


}
