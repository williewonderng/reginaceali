
<!-- Create Member Modal -->
<div id="createMemberModal" class="fixed inset-0 hidden z-50 bg-black/60 items-center justify-center transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-8 relative border border-gray-100 animate-fadeIn">
        <button type="button" onclick="closeModal('createMemberModal')" aria-label="Close" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-400 rounded-full p-1 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-2xl font-bold mb-6 text-emerald-700 flex items-center gap-2">
            <span class="text-lg">➕</span> Add New Member
        </h2>
    <form method="POST" action="{{ route('members.store') }}" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @include('members.partials.form')
            <div class="flex justify-end gap-4 mt-8">
                <button type="button" onclick="closeModal('createMemberModal')" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold shadow hover:bg-gray-200 transition">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-emerald-600 text-white rounded-lg font-bold shadow hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-400 transition">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Member Modal -->
<div id="editMemberModal" class="fixed inset-0 hidden z-50 bg-black/60 items-center justify-center transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-8 relative border border-gray-100 animate-fadeIn">
        <button type="button" onclick="closeModal('editMemberModal')" aria-label="Close" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-full p-1 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-2xl font-bold mb-6 text-blue-700 flex items-center gap-2">
            <span class="text-lg">✏️</span> Edit Member
        </h2>
    <form method="POST" id="editForm" action="" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('members.partials.form')
            <div class="flex justify-end gap-4 mt-8">
                <button type="button" onclick="closeModal('editMemberModal')" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold shadow hover:bg-gray-200 transition">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white rounded-lg font-bold shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-400 transition">Update</button>
            </div>
        </form>
    </div>
</div>
