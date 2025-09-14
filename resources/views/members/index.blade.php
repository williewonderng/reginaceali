<x-app-layout>
    <div class="flex min-h-screen bg-gradient-to-br from-emerald-50 via-white to-emerald-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6 border-b">
                <h1 class="text-xl font-bold text-emerald-600">Chaplaincy Admin</h1>
            </div>
            <nav class="p-4 space-y-2 text-gray-700">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center p-2 rounded-md
                          {{ request()->routeIs('dashboard') ? 'bg-emerald-50 text-emerald-700 font-medium' : 'hover:bg-gray-100' }}">
                    Dashboard
                </a>
                <a href="{{ route('members.index') }}"
                   class="block p-2 rounded-md
                          {{ request()->routeIs('members.*') ? 'bg-emerald-50 text-emerald-700 font-medium' : 'hover:bg-gray-100' }}">
                    Members
                </a>
                <a href="#" class="block p-2 rounded-md hover:bg-gray-100">Events</a>
                <a href="#" class="block p-2 rounded-md hover:bg-gray-100">Ministries</a>
                <a href="#" class="block p-2 rounded-md hover:bg-gray-100">Gallery</a>
                <a href="#" class="block p-2 rounded-md hover:bg-gray-100">Settings</a>
                <a href="{{ url('/') }}" class="block p-2 rounded-md hover:bg-gray-100 text-emerald-600 font-semibold">&larr; Home</a>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-8">
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-emerald-100 text-emerald-800 font-semibold border border-emerald-200 shadow">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Top controls -->
            <div class="flex flex-wrap justify-between items-center mb-8 gap-4">
                <div class="flex items-center gap-4">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-emerald-100 text-emerald-700 rounded-xl font-semibold shadow hover:bg-emerald-200 transition">
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 mr-2' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 19l-7-7 7-7'/></svg>
                        Back to Dashboard
                    </a>
                    <h1 class="text-3xl font-extrabold text-emerald-700 tracking-tight">Members</h1>
                </div>
                <div class="flex gap-3 flex-wrap items-center">
                    <!-- Search -->
                    <div class="relative">
                        <input type="text" id="searchBox" placeholder="Search..."
                               class="px-4 py-2 pr-10 border border-emerald-200 rounded-xl focus:ring-2 focus:ring-emerald-300 bg-white/80 shadow-sm">
                        <button type="button" id="clearSearchBtn" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-emerald-600 focus:outline-none" style="display:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>

                    <!-- Gender Filter -->
                    <select id="genderFilter" class="px-4 py-2 border border-emerald-200 rounded-xl bg-white/80 shadow-sm">
                        <option value="">All Genders</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                    <!-- Marital Status Filter -->
                    <select id="maritalFilter" class="px-4 py-2 border border-emerald-200 rounded-xl bg-white/80 shadow-sm">
                        <option value="">All Marital Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>

                    <!-- Expand/Collapse -->
                    <button id="toggleDetailsBtn"
                        class="px-5 py-2 bg-emerald-600 text-white rounded-xl font-semibold shadow hover:bg-emerald-700 transition">
                        Expand All
                    </button>

                    <!-- Add New -->
                    <button onclick="openModal('createMemberModal')"
                        class="px-5 py-2 bg-blue-600 text-white rounded-xl font-semibold shadow hover:bg-blue-700 transition flex items-center gap-2">
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'/></svg>
                        Add Member
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white/90 shadow-xl rounded-2xl overflow-x-auto border border-emerald-100">
                <table class="min-w-full divide-y divide-emerald-100" id="membersTable">
                    <thead class="bg-emerald-50">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold text-emerald-700">Passport</th>
                            <th class="px-4 py-3 text-left font-semibold text-emerald-700">Surname</th>
                            <th class="px-4 py-3 font-semibold text-emerald-700">First Name</th>
                            <th class="px-4 py-3 font-semibold text-emerald-700">Gender</th>
                            <th class="px-4 py-3 font-semibold text-emerald-700">Phone</th>
                            <th class="px-4 py-3 font-semibold text-emerald-700">Email</th>
                            <th class="px-4 py-3 font-semibold text-emerald-700">Occupation</th>
                            <th class="px-4 py-3 font-semibold text-emerald-700">Marital Status</th>
                            <th class="px-4 py-3 font-semibold text-emerald-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-emerald-50">
                        @foreach ($members as $member)
                            <!-- Main row -->
                            <tr class="bg-white hover:bg-emerald-50 transition">
                                <td class="px-4 py-2">
                                    @if (!empty($member->passport) && file_exists(public_path('storage/' . $member->passport)))
                                        <img src="{{ asset('storage/' . $member->passport) }}?v={{ filemtime(public_path('storage/' . $member->passport)) }}" alt="Passport" class="h-10 w-10 object-cover rounded-full border border-emerald-200">
                                    @else
                                        <img src="{{ asset('images/avatar.png') }}" alt="No Passport" class="h-10 w-10 object-cover rounded-full border border-emerald-200 opacity-50">
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $member->surname }}</td>
                                <td class="px-4 py-2">{{ $member->first_name }}</td>
                                <td class="px-4 py-2">{{ $member->gender }}</td>
                                <td class="px-4 py-2">{{ $member->phone }}</td>
                                <td class="px-4 py-2">{{ $member->email }}</td>
                                <td class="px-4 py-2">{{ $member->occupation }}</td>
                                <td class="px-4 py-2">{{ $member->marital_status }}</td>
                                <td class="px-4 py-2 flex gap-2 items-center">
                                    <!-- Expand -->
                                    <button class="toggleRow text-emerald-600 hover:text-emerald-800 p-2 rounded-full transition" data-id="{{ $member->id }}" title="View Details">
                                        <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4.5v15m7.5-7.5h-15'/></svg>
                                    </button>

                                    <!-- Edit -->
                                    <button class="p-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition" data-member='@json($member)' onclick="openEdit(this)" title="Edit">
                                        <svg xmlns='http://www.w3.org/2000/svg' class='w-4 h-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h2v2h2v-2h2v-2h-2v-2h-2v2h-2v2z'/></svg>
                                    </button>

                                    <!-- Print -->
                                    <a href="{{ route('members.print', $member) }}" target="_blank" class="p-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition" title="Print">
                                        <svg xmlns='http://www.w3.org/2000/svg' class='w-4 h-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 9V2h12v7'/><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18H4a2 2 0 01-2-2V7a2 2 0 012-2h16a2 2 0 012 2v9a2 2 0 01-2 2h-2'/></svg>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('members.destroy', $member) }}" method="POST" onsubmit="return confirm('Delete this member?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition" title="Delete">
                                            <svg xmlns='http://www.w3.org/2000/svg' class='w-4 h-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'/></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Hidden details row -->
                            <tr id="details-{{ $member->id }}" class="hidden bg-emerald-50/60">
                                <td colspan="8" class="px-6 py-8 text-sm text-emerald-900">
                                    <div class="a4-container mx-auto bg-white rounded-lg shadow border border-emerald-100 p-8" style="max-width: 800px;">
                                        <div class="flex flex-col md:flex-row items-center mb-6 gap-6">
                                            @if (!empty($member->passport) && file_exists(public_path($member->passport)))
                                                <img src="{{ asset($member->passport) }}?v={{ filemtime(public_path($member->passport)) }}" alt="Passport" class="rounded border" style="width: 100px; height: 100px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('images/avatar.png') }}" alt="No Passport" class="rounded border" style="width: 100px; height: 100px; object-fit: cover; opacity: 0.5;">
                                            @endif
                                            <div>
                                                <h3 class="text-2xl font-bold text-emerald-700 mb-2">{{ $member->surname }} {{ $member->first_name }} {{ $member->middle_name }}</h3>
                                                <div class="text-emerald-800 mb-1"><strong>Date of Birth:</strong> {{ $member->dob?->format('d M Y') }}</div>
                                                <div class="text-emerald-800 mb-1"><strong>Gender:</strong> {{ $member->gender }}</div>
                                                <div class="text-emerald-800 mb-1"><strong>Nationality:</strong> {{ $member->nationality }}</div>
                                                <div class="text-emerald-800 mb-1"><strong>State of Origin:</strong> {{ $member->state_of_origin }}</div>
                                                <div class="text-emerald-800 mb-1"><strong>LGA:</strong> {{ $member->lga }}</div>
                                                <div class="text-emerald-800 mb-1"><strong>Tribe:</strong> {{ $member->tribe }}</div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                            <div class="card p-4 bg-emerald-50 border border-emerald-100 rounded">
                                                <h5 class="font-bold mb-2">Parish Information</h5>
                                                <div><strong>Home Diocese:</strong> {{ $member->home_diocese }}</div>
                                                <div><strong>Home Parish:</strong> {{ $member->home_parish }}</div>
                                                <div><strong>Last Parish Residence:</strong> {{ $member->last_parish_residence }}</div>
                                            </div>
                                            <div class="card p-4 bg-emerald-50 border border-emerald-100 rounded">
                                                <h5 class="font-bold mb-2">Contact</h5>
                                                <div><strong>Address:</strong> {{ $member->residential_address }}</div>
                                                <div><strong>Phone:</strong> {{ $member->phone }}</div>
                                                <div><strong>Email:</strong> {{ $member->email }}</div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                            <div class="card p-4 bg-emerald-50 border border-emerald-100 rounded">
                                                <h5 class="font-bold mb-2">Occupation</h5>
                                                <div><strong>Occupation:</strong> {{ $member->occupation }}</div>
                                                <div><strong>Business Address:</strong> {{ $member->business_address }}</div>
                                            </div>
                                            <div class="card p-4 bg-emerald-50 border border-emerald-100 rounded">
                                                <h5 class="font-bold mb-2">Family</h5>
                                                <div><strong>Marital Status:</strong> {{ $member->marital_status }}</div>
                                                <div><strong>Spouse Name:</strong> {{ $member->spouse_name }}</div>
                                                <div><strong>Spouse Phone:</strong> {{ $member->spouse_phone }}</div>
                                                <div><strong>Next of Kin:</strong> {{ $member->next_of_kin }}</div>
                                                <div><strong>Next of Kin Phone:</strong> {{ $member->next_of_kin_phone }}</div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                            <div class="card p-4 bg-emerald-50 border border-emerald-100 rounded">
                                                <h5 class="font-bold mb-2">Sacraments</h5>
                                                <div><strong>Baptism:</strong> {{ $member->baptism ? 'Yes' : 'No' }}</div>
                                                <div><strong>Communion:</strong> {{ $member->communion ? 'Yes' : 'No' }}</div>
                                                <div><strong>Confirmation:</strong> {{ $member->confirmation ? 'Yes' : 'No' }}</div>
                                            </div>
                                            <div class="card p-4 bg-emerald-50 border border-emerald-100 rounded">
                                                <h5 class="font-bold mb-2">Groups</h5>
                                                <div>{{ $member->groups }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if($members->isEmpty())
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">No members yet.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-8 flex justify-center">{{ $members->links() }}</div>
        </main>
    </div>

    <!-- CREATE MODAL -->
    <div id="createMemberModal" class="fixed inset-0 bg-black/40 z-50 items-center justify-center hidden">
        <div class="bg-white/90 rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto p-8 border border-emerald-100">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-emerald-700">Add New Member</h3>
                <button onclick="closeModal('createMemberModal')" class="text-gray-400 hover:text-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-400 rounded-full p-2 transition" title="Close">
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'/></svg>
                </button>
            </div>
            <form action="{{ route('members.store') }}" method="POST" id="createForm" class="space-y-6">
                @csrf
                @include('members.partials.form', ['member' => null])
                <div class="flex justify-end">
                    <button type="submit" class="bg-emerald-600 text-white px-6 py-2.5 rounded-xl font-bold shadow hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-400 transition flex items-center gap-2">
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4.5 12.75l6 6 9-13.5'/></svg>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div id="editMemberModal" class="fixed inset-0 bg-black/40 z-50 items-center justify-center hidden">
        <div class="bg-white/90 rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto p-8 border border-emerald-100">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-blue-700">Edit Member</h3>
                <button onclick="closeModal('editMemberModal')" class="text-gray-400 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-full p-2 transition" title="Close">
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'/></svg>
                </button>
            </div>
            <form action="#" method="POST" id="editForm" class="space-y-6">
                @csrf
                @method('PUT')
                @include('members.partials.form', ['member' => null])
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl font-bold shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-400 transition flex items-center gap-2">
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4.5 12.75l6 6 9-13.5'/></svg>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Modal
        function openModal(id){
            const el = document.getElementById(id);
            el.classList.remove('hidden');
            el.classList.add('flex');
        }
        function closeModal(id){
            const el = document.getElementById(id);
            el.classList.add('hidden');
            el.classList.remove('flex');
        }

        // Edit Modal Fill
        function openEdit(btn) {
            const m = JSON.parse(btn.dataset.member);
            const f = document.getElementById('editForm');
            f.action = "{{ url('/members') }}/" + m.id;

            const set = (name, val) => { if (f.elements[name]) f.elements[name].value = val ?? ''; };
            set('surname', m.surname);
            set('first_name', m.first_name);
            set('middle_name', m.middle_name);
            set('dob', m.dob);
            set('gender', m.gender);
            set('nationality', m.nationality);
            set('state_of_origin', m.state_of_origin);
            set('lga', m.lga);
            set('tribe', m.tribe);
            set('home_diocese', m.home_diocese);
            set('home_parish', m.home_parish);
            set('last_parish_residence', m.last_parish_residence);
            set('residential_address', m.residential_address);
            set('phone', m.phone);
            set('email', m.email);
            set('occupation', m.occupation);
            set('business_address', m.business_address);
            set('marital_status', m.marital_status);
            set('spouse_name', m.spouse_name);
            set('spouse_phone', m.spouse_phone);
            set('next_of_kin', m.next_of_kin);
            set('next_of_kin_phone', m.next_of_kin_phone);
            // Checkboxes
            if (f.elements['baptism']) f.elements['baptism'].checked = !!m.baptism;
            if (f.elements['communion']) f.elements['communion'].checked = !!m.communion;
            if (f.elements['confirmation']) f.elements['confirmation'].checked = !!m.confirmation;
            // Textarea
            if (f.elements['groups']) f.elements['groups'].value = m.groups ?? '';

            openModal('editMemberModal');
        }

        // Expand/Collapse all
        const toggleBtn = document.getElementById('toggleDetailsBtn');
        const detailRows = document.querySelectorAll('[id^="details-"]');
        let expanded = false;

        toggleBtn.addEventListener('click', () => {
            expanded = !expanded;
            detailRows.forEach(row => row.classList.toggle('hidden', !expanded));
            toggleBtn.textContent = expanded ? 'Collapse All' : 'Expand All';
        });

        // Individual row toggle
        document.querySelectorAll('.toggleRow').forEach(btn => {
            btn.addEventListener('click', () => {
                const row = document.getElementById('details-' + btn.dataset.id);
                row.classList.toggle('hidden');
            });
        });

        // Advanced filter
        function filterTable() {
            let search = document.getElementById('searchBox').value.toLowerCase();
            let gender = document.getElementById('genderFilter').value;
            let marital = document.getElementById('maritalFilter').value;
            let rows = document.querySelectorAll('#membersTable tbody tr');
            rows.forEach(row => {
                if(row.id.startsWith('details-')) return;
                let text = row.innerText.toLowerCase();
                let genderCell = row.querySelector('td:nth-child(4)')?.innerText.trim();
                let maritalCell = row.querySelector('td:nth-child(8)')?.innerText.trim();
                let show = text.includes(search);
                if (gender && genderCell !== gender) show = false;
                if (marital && maritalCell !== marital) show = false;
                row.style.display = show ? '' : 'none';
                let details = document.getElementById('details-' + row.querySelector('.toggleRow')?.dataset.id);
                if(details) details.style.display = row.style.display;
            });
        }
        const searchBox = document.getElementById('searchBox');
        const clearBtn = document.getElementById('clearSearchBtn');
        searchBox.addEventListener('input', function() {
            filterTable();
            clearBtn.style.display = this.value ? 'block' : 'none';
        });
        clearBtn.addEventListener('click', function() {
            searchBox.value = '';
            filterTable();
            clearBtn.style.display = 'none';
            searchBox.focus();
        });
        document.getElementById('genderFilter').addEventListener('change', filterTable);
        document.getElementById('maritalFilter').addEventListener('change', filterTable);
    </script>
</x-app-layout>
