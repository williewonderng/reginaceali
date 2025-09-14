<x-app-layout>
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

    <div class="max-w-3xl mx-auto bg-gradient-to-br from-white via-emerald-50 to-white p-10 rounded-3xl shadow-2xl mt-12 border border-emerald-100">
        <!-- Logo + Header -->
        <div class="flex flex-col items-center mb-10">
            <img src="{{ asset('images/mary-logo.png') }}" alt="Mary Logo" class="h-24 w-24 mb-3 drop-shadow-xl">
            <h1 class="text-4xl font-extrabold text-emerald-700 tracking-tight">Regina Caeli Catholic Chaplaincy</h1>
        </div>

        <h2 class="text-2xl font-bold mb-10 text-center text-emerald-800 tracking-wide">Edit Member</h2>

        <form action="{{ route('members.update', $member->id) }}" method="POST" class="space-y-10" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('members.partials.form', ['member' => $member])

            <div class="flex justify-end space-x-6 pt-8 border-t border-emerald-200">
                <a href="{{ route('members.index') }}" class="px-6 py-2.5 bg-white text-emerald-700 rounded-xl font-semibold shadow hover:bg-emerald-50 border border-emerald-200 transition">Cancel</a>
                <button type="submit" class="px-7 py-2.5 bg-emerald-600 text-white rounded-xl font-bold shadow-lg hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-400 transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                    Update Member
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
