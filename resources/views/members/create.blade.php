        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg border border-red-200">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @if ($errors->has('passport'))
                    <div class="mt-2 text-sm text-red-700 font-semibold">
                        Passport Error: {{ $errors->first('passport') }}
                    </div>
                @endif
            </div>
        @endif
<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <!-- Logo + Header -->
        <div class="flex items-center justify-center mb-6">
            <img src="{{ asset('images/mary-logo.png') }}" alt="Mary Logo" class="h-16 w-16 mr-3">
            <h1 class="text-2xl font-bold text-emerald-700">Regina Caeli Catholic Chaplaincy</h1>
        </div>

        <h2 class="text-xl font-semibold mb-6 text-center">Add New Member</h2>

        <!-- Form -->
    <form action="{{ route('members.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf

            <div>
                <label class="block text-sm font-medium">Passport Photo</label>
                <div class="mb-2 flex justify-center">
                    <img id="passportPreview" src="{{ asset('images/avatar.png') }}" alt="Passport Preview" class="h-24 w-24 object-cover rounded border border-emerald-200" style="background: #f8fafc;" />
                </div>
                <input type="file" name="passport" accept="image/*" class="w-full border rounded p-2" onchange="previewPassport(event)">
                @error('passport')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <script>
                function previewPassport(event) {
                    const [file] = event.target.files;
                    if (file) {
                        document.getElementById('passportPreview').src = URL.createObjectURL(file);
                    }
                }
            </script>

            <!-- Personal Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium">Surname</label>
                    <input type="text" name="surname" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">First Name</label>
                    <input type="text" name="first_name" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Middle Name</label>
                    <input type="text" name="middle_name" class="w-full border rounded p-2">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium">Date of Birth</label>
                    <input type="date" name="dob" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Gender</label>
                    <select name="gender" class="w-full border rounded p-2">
                        <option value="">-- Select --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">Nationality</label>
                    <input type="text" name="nationality" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">State of Origin</label>
                    <input type="text" name="state_of_origin" class="w-full border rounded p-2">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium">LGA</label>
                    <input type="text" name="lga" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Tribe</label>
                    <input type="text" name="tribe" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Home Diocese</label>
                    <input type="text" name="home_diocese" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Home Parish</label>
                    <input type="text" name="home_parish" class="w-full border rounded p-2">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Last Parish Residence</label>
                    <input type="text" name="last_parish_residence" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Residential Address</label>
                    <input type="text" name="residential_address" class="w-full border rounded p-2">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium">Phone</label>
                    <input type="text" name="phone" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Occupation</label>
                    <input type="text" name="occupation" class="w-full border rounded p-2">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium">Business Address</label>
                <input type="text" name="business_address" class="w-full border rounded p-2">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium">Marital Status</label>
                    <input type="text" name="marital_status" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Spouse Name</label>
                    <input type="text" name="spouse_name" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Spouse Phone</label>
                    <input type="text" name="spouse_phone" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Next of Kin</label>
                    <input type="text" name="next_of_kin" class="w-full border rounded p-2">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium">Next of Kin Phone</label>
                    <input type="text" name="next_of_kin_phone" class="w-full border rounded p-2">
                </div>
                <div class="flex items-center gap-2 mt-6">
                    <input type="checkbox" name="baptism" value="1" class="rounded border-emerald-300 text-emerald-600 focus:ring-emerald-400">
                    <label class="text-sm font-medium">Baptism</label>
                </div>
                <div class="flex items-center gap-2 mt-6">
                    <input type="checkbox" name="communion" value="1" class="rounded border-emerald-300 text-emerald-600 focus:ring-emerald-400">
                    <label class="text-sm font-medium">Communion</label>
                </div>
                <div class="flex items-center gap-2 mt-6">
                    <input type="checkbox" name="confirmation" value="1" class="rounded border-emerald-300 text-emerald-600 focus:ring-emerald-400">
                    <label class="text-sm font-medium">Confirmation</label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium">Groups</label>
                <textarea name="groups" rows="2" class="w-full border rounded p-2"></textarea>
            </div>
            <!-- Buttons -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('members.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">
                    Save Member
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
