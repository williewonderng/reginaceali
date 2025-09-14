<div class="mt-4">
    <label class="block text-sm font-semibold text-emerald-700 mb-1">Passport Photo</label>
    @if (!empty($member->passport) && file_exists(public_path($member->passport)))
        <div class="mb-2">
            <img src="{{ asset($member->passport) }}?v={{ filemtime(public_path($member->passport)) }}" alt="Passport" class="h-24 w-24 object-cover rounded border border-emerald-200">
        </div>
    @else
        <div class="mb-2">
            <img src="{{ asset('images/avatar.png') }}" alt="No Passport" class="h-24 w-24 object-cover rounded border border-emerald-200 opacity-50">
        </div>
    @endif
    <input type="file" name="passport" accept="image/*" class="w-full border border-emerald-200 rounded-lg p-2.5">
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Surname</label>
        <input type="text" name="surname" value="{{ old('surname', $member->surname ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition" required>
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name', $member->first_name ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition" required>
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Middle Name</label>
        <input type="text" name="middle_name" value="{{ old('middle_name', $member->middle_name ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4">
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Date of Birth</label>
        <input type="date" name="dob" value="{{ old('dob', $member->dob ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Gender</label>
        <select name="gender" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
            <option value="">-- Select --</option>
            <option value="Male" {{ old('gender', $member->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender', $member->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Nationality</label>
        <input type="text" name="nationality" value="{{ old('nationality', $member->nationality ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">State of Origin</label>
        <input type="text" name="state_of_origin" value="{{ old('state_of_origin', $member->state_of_origin ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4">
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">LGA</label>
        <input type="text" name="lga" value="{{ old('lga', $member->lga ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Tribe</label>
        <input type="text" name="tribe" value="{{ old('tribe', $member->tribe ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Home Diocese</label>
        <input type="text" name="home_diocese" value="{{ old('home_diocese', $member->home_diocese ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Home Parish</label>
        <input type="text" name="home_parish" value="{{ old('home_parish', $member->home_parish ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Last Parish Residence</label>
        <input type="text" name="last_parish_residence" value="{{ old('last_parish_residence', $member->last_parish_residence ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Residential Address</label>
        <input type="text" name="residential_address" value="{{ old('residential_address', $member->residential_address ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $member->phone ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Occupation</label>
        <input type="text" name="occupation" value="{{ old('occupation', $member->occupation ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
</div>

<div class="mt-4">
    <label class="block text-sm font-semibold text-emerald-700 mb-1">Business Address</label>
    <input type="text" name="business_address" value="{{ old('business_address', $member->business_address ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4">
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Marital Status</label>
        <input type="text" name="marital_status" value="{{ old('marital_status', $member->marital_status ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Spouse Name</label>
        <input type="text" name="spouse_name" value="{{ old('spouse_name', $member->spouse_name ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Spouse Phone</label>
        <input type="text" name="spouse_phone" value="{{ old('spouse_phone', $member->spouse_phone ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Next of Kin</label>
        <input type="text" name="next_of_kin" value="{{ old('next_of_kin', $member->next_of_kin ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4">
    <div>
        <label class="block text-sm font-semibold text-emerald-700 mb-1">Next of Kin Phone</label>
        <input type="text" name="next_of_kin_phone" value="{{ old('next_of_kin_phone', $member->next_of_kin_phone ?? '') }}" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
    </div>
    <div class="flex items-center gap-2 mt-6">
        <input type="checkbox" name="baptism" value="1" {{ old('baptism', $member->baptism ?? false) ? 'checked' : '' }} class="rounded border-emerald-300 text-emerald-600 focus:ring-emerald-400">
        <label class="text-sm font-semibold text-emerald-700">Baptism</label>
    </div>
    <div class="flex items-center gap-2 mt-6">
        <input type="checkbox" name="communion" value="1" {{ old('communion', $member->communion ?? false) ? 'checked' : '' }} class="rounded border-emerald-300 text-emerald-600 focus:ring-emerald-400">
        <label class="text-sm font-semibold text-emerald-700">Communion</label>
    </div>
    <div class="flex items-center gap-2 mt-6">
        <input type="checkbox" name="confirmation" value="1" {{ old('confirmation', $member->confirmation ?? false) ? 'checked' : '' }} class="rounded border-emerald-300 text-emerald-600 focus:ring-emerald-400">
        <label class="text-sm font-semibold text-emerald-700">Confirmation</label>
    </div>
</div>

<div class="mt-4">
    <label class="block text-sm font-semibold text-emerald-700 mb-1">Groups</label>
    <textarea name="groups" class="w-full border border-emerald-200 rounded-lg p-2.5 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">{{ old('groups', $member->groups ?? '') }}</textarea>
</div>
