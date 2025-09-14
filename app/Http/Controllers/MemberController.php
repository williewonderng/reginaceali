<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::paginate(10); // paginated
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
   $data = $request->validate([
    'surname' => 'required|string|max:255',
    'first_name' => 'required|string|max:255',
    'middle_name' => 'nullable|string|max:255',
    'dob' => 'nullable|date',
    'gender' => 'nullable|string|max:10',
    'nationality' => 'nullable|string|max:255',
    'state_of_origin' => 'nullable|string|max:255',
    'lga' => 'nullable|string|max:255',
    'tribe' => 'nullable|string|max:255',
    'home_diocese' => 'nullable|string|max:255',
    'home_parish' => 'nullable|string|max:255',
    'last_parish_residence' => 'nullable|string|max:255',
    'residential_address' => 'nullable|string',
    'phone' => 'nullable|string|max:20',
    'email' => 'nullable|email',
    'occupation' => 'nullable|string|max:255',
    'business_address' => 'nullable|string',
    'marital_status' => 'nullable|string|max:50',
    'spouse_name' => 'nullable|string|max:255',
    'spouse_phone' => 'nullable|string|max:20',
    'next_of_kin' => 'nullable|string|max:255',
    'next_of_kin_phone' => 'nullable|string|max:20',
    'baptism' => 'nullable|boolean',
    'communion' => 'nullable|boolean',
    'confirmation' => 'nullable|boolean',
    'groups' => 'nullable|string',
    'passport' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
]);


        // Ensure dob is stored as Y-m-d or null
        if (!empty($data['dob'])) {
            $data['dob'] = date('Y-m-d', strtotime($data['dob']));
        } else {
            $data['dob'] = null;
        }

        if ($request->hasFile('passport')) {
    Log::info('Passport file detected in request.');

    $file = $request->file('passport');
    $originalName = $file->getClientOriginalName();
    $mime = $file->getMimeType();
    $size = $file->getSize();

    Log::info('Passport file details', [
        'original_name' => $originalName,
        'mime_type' => $mime,
        'size' => $size,
    ]);

    $filename = uniqid('passport_') . '.' . $file->getClientOriginalExtension();

    try {
        Log::info('Attempting to store passport file.');

        // Store the file in storage/app/public/passports
        $storedPath = $file->store('passports', 'public');

        Log::info('File stored successfully.', [
            'stored_path' => $storedPath
        ]);

        $data['passport'] = 'images/' . $storedPath;
    } catch (\Exception $e) {
        Log::error('Passport upload failed', [
            'error' => $e->getMessage(),
            'original_name' => $originalName,
            'mime_type' => $mime,
            'size' => $size,
        ]);

        return back()->withErrors(['passport' => 'Passport upload failed: ' . $e->getMessage()])
                     ->withInput();
    }
} else {
    Log::warning('No passport file found in request.');
}

try {
    Log::info('Attempting to create new Member record.', ['data' => $data]);

    Member::create($data);

    Log::info('Member record created successfully.');

    return redirect()->route('members.index')->with('success', 'Member added successfully');
} catch (\Exception $e) {
    Log::error('Failed to create Member record.', [
        'error' => $e->getMessage(),
        'data' => $data
    ]);

    return back()->withErrors(['member' => 'Failed to save member record: ' . $e->getMessage()])
                 ->withInput();
}

        // // Handle passport upload with unique filename
        // if ($request->hasFile('passport')) {
        //     $file = $request->file('passport');
        //     $filename = uniqid('passport_') . '.' . $file->getClientOriginalExtension();
        //     try {
        //         // $file->move(public_path('images'), $filename);
        //         $filename = $file->store('passports', 'public'); // stored in storage/app/public/passports

        //         $data['passport'] = 'images/' . $filename;
        //     } catch (\Exception $e) {
        //         Log::error('Passport upload failed', [
        //         'error' => $e->getMessage(),
        //         'file' => $file->getClientOriginalName(),
        //         'mime' => $file->getMimeType(),
        //         'size' => $file->getSize(),
        //         ]);
        //         return back()->withErrors(['passport' => 'Passport upload failed: ' . $e->getMessage()])->withInput();
        //     }
        // }

        // Member::create($data);
        // return redirect()->route('members.index')->with('success', 'Member added successfully');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'surname' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'nationality' => 'nullable|string|max:255',
            'state_of_origin' => 'nullable|string|max:255',
            'lga' => 'nullable|string|max:255',
            'tribe' => 'nullable|string|max:255',
            'home_diocese' => 'nullable|string|max:255',
            'home_parish' => 'nullable|string|max:255',
            'last_parish_residence' => 'nullable|string|max:255',
            'residential_address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'occupation' => 'nullable|string|max:255',
            'business_address' => 'nullable|string',
            'marital_status' => 'nullable|string|max:50',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_phone' => 'nullable|string|max:20',
            'next_of_kin' => 'nullable|string|max:255',
            'next_of_kin_phone' => 'nullable|string|max:20',
            'baptism' => 'nullable|boolean',
            'communion' => 'nullable|boolean',
            'confirmation' => 'nullable|boolean',
            'groups' => 'nullable|string',
             'passport' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ensure dob is stored as Y-m-d or null
        if (!empty($data['dob'])) {
            $data['dob'] = date('Y-m-d', strtotime($data['dob']));
        } else {
            $data['dob'] = null;
        }

        if ($request->hasFile('passport')) {
            $file = $request->file('passport');
            $filename = uniqid('passport_') . '.' . $file->getClientOriginalExtension();
            try {
                // Delete old image if it exists
                if ($member->passport && file_exists(public_path($member->passport))) {
                    unlink(public_path($member->passport));
                }
                $file->move(public_path('images'), $filename);
                $data['passport'] = 'images/' . $filename;
            } catch (\Exception $e) {
                    Log::error('Passport upload failed (update)', [
                    'error' => $e->getMessage(),
                    'file' => $file->getClientOriginalName(),
                    'mime' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ]);

                return back()->withErrors(['passport' => 'Passport upload failed: ' . $e->getMessage()])->withInput();
            }
        } else {
            $data['passport'] = $member->passport;
        }

        $member->update($data);
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function print(Member $member)
    {
        return view('members.print', compact('member'));
    }
}
