<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Membership Bio-Data Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @media print {
      @page {
        size: A4 portrait;
        margin: 0;
      }
      html, body {
        width: 210mm;
        height: 297mm;
        background: #fff !important;
        margin: 0 !important;
        padding: 0 !important;
      }
      .a4-page {
        width: 210mm;
        height: 297mm;
        overflow: hidden;
        page-break-after: avoid;
      }
      .no-print {
        display: none !important;
      }
    }

    /* Thin patterned border frame */
    .pattern-border {
      border: 10px solid transparent;
      border-image: repeating-linear-gradient(
        90deg,
        black 0 6px,
        white 6px 12px
      ) 30;
      box-sizing: border-box;
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-900 antialiased">

  <!-- Action Buttons (hidden on print) -->
  <div class="flex justify-end gap-3 p-4 no-print">
    <a href="{{ route('dashboard') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow flex items-center">
      ← Back
    </a>
    <button onclick="window.print()"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
      🖨 Print
    </button>
  </div>

  <!-- A4 Page -->
  <div class="a4-page mx-auto pattern-border flex flex-col p-6 bg-white relative">
    <!-- Watermark -->
    <div style="position:absolute;z-index:0;top:50%;left:50%;transform:translate(-50%,-50%) rotate(-20deg);pointer-events:none;opacity:0.08;font-size:3.5rem;font-weight:900;letter-spacing:0.1em;white-space:nowrap;user-select:none;line-height:1;color:#047857;">
      REGINA CAELI CATHOLIC CHAPLAINCY
    </div>

    <!-- Top Header: Logos + Title -->
    <div class="flex items-center justify-between">
      <!-- Mary Logo (use transparent PNG for clean circle) -->
  <img src="{{ asset('images/mary.jpeg') }}" alt="Mary Logo"
       class="h-20 w-20 rounded-full object-cover bg-white shadow" />

      <div class="flex-1 text-center px-4">
        <h2 class="text-lg font-extrabold leading-tight">REGINA CAELI CATHOLIC CHAPLAINCY</h2>
        <h3 class="text-base font-semibold leading-tight">FEDERAL UNIVERSITY LOKOJA</h3>
      </div>

      <!-- School Logo -->
  <img src="{{ asset('images/school.png') }}" alt="School Logo"
       class="h-20 w-20 rounded-full object-cover bg-white shadow" />
    </div>

    <!-- Second Row: Form Title + Passport -->
    <div class="flex items-center justify-between mt-4">
      <div class="flex-1 flex justify-center">
        <h4 class="inline-block border border-black px-4 py-1 font-bold text-sm">
          MEMBERSHIP BIO-DATA FORM
        </h4>
      </div>
      <div class="border border-black h-[110px] w-[90px] flex items-center justify-center bg-gray-50 ml-6 overflow-hidden">
        @if (!empty($member->passport) && file_exists(public_path($member->passport)))
          <img src="{{ asset($member->passport) }}?v={{ filemtime(public_path($member->passport)) }}" alt="Passport" class="object-cover h-full w-full" />
        @else
          <img src="{{ asset('images/avatar.png') }}" alt="No Passport" class="object-cover h-full w-full opacity-50">
        @endif
      </div>
    </div>

    <!-- Form Fields -->
    <div class="mt-8 grid gap-3 text-sm leading-7">

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">NAME:</span>
        <span class="border-b border-black flex-1 px-1">
          {{ $member->surname }} {{ $member->first_name }} {{ $member->middle_name }}
        </span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">DATE OF BIRTH:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->dob?->format('d M Y') }}</span>
        <span class="font-semibold min-w-[100px] ml-6">GENDER:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->gender }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">NATIONALITY:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->nationality }}</span>
        <span class="font-semibold min-w-[160px] ml-6">STATE OF ORIGIN:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->state_of_origin }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">LOCAL GOVERNMENT AREA:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->lga }}</span>
        <span class="font-semibold min-w-[100px] ml-6">TRIBE:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->tribe }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">HOME DIOCESE:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->home_diocese }}</span>
        <span class="font-semibold min-w-[160px] ml-6">HOME PARISH:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->home_parish }}</span>
      </div>


      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">LAST PARISH OF RESIDENCE:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->last_parish_residence }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">RESIDENTIAL ADDRESS:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->residential_address }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">PHONE NUMBER(S):</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->phone }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">E-MAIL ADDRESS:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->email }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">OCCUPATION:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->occupation }}</span>
      </div>


      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">BUSINESS/OFFICE ADDRESS:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->business_address }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">MARITAL STATUS:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->marital_status }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">IF MARRIED, NAME OF SPOUSE:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->spouse_name }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">SPOUSE PHONE:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->spouse_phone }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[200px]">NEXT OF KIN:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->next_of_kin }}</span>
        <span class="font-semibold min-w-[120px] ml-6">PHONE NUMBER:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->next_of_kin_phone }}</span>
      </div>


      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold">ARE YOU BAPTIZED?</span>
        <span class="border-b border-black w-20 text-center">{{ $member->baptism ? 'Yes' : 'No' }}</span>
        <span class="font-semibold ml-6">ARE YOU A COMMUNICANT?</span>
        <span class="border-b border-black w-20 text-center">{{ $member->communion ? 'Yes' : 'No' }}</span>
        <span class="font-semibold ml-6">ARE YOU CONFIRMED?</span>
        <span class="border-b border-black w-20 text-center">{{ $member->confirmation ? 'Yes' : 'No' }}</span>
      </div>

      <div class="flex flex-wrap items-baseline gap-x-4">
        <span class="font-semibold min-w-[260px]">GROUPS YOU BELONG IN THE CHAPLAINCY:</span>
        <span class="border-b border-black flex-1 px-1">{{ $member->groups }}</span>
      </div>
    </div>
  </div>
</body>
</html>
