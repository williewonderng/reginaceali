<!DOCTYPE html>
<html>
<head>
    <title>Member Bio Data - {{ $member->surname }} {{ $member->first_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #e9ecef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        .a4-container {
            width: 210mm;
            min-height: 297mm;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border-radius: 6px;
            padding: 32px 28px;
        }
        h2 {
            font-weight: 600;
            color: #0d6efd;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 8px;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
        }
        .section-title {
            font-size: 1rem;
            font-weight: 600;
            color: #0d6efd;
            margin: 16px 0 8px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }
        td {
            padding: 6px 8px;
            border-bottom: 1px solid #dee2e6;
            vertical-align: top;
            font-size: 0.95rem;
        }
        td:first-child {
            width: 35%;
            font-weight: 600;
            background: #f8f9fa;
        }
        .passport {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        @media print {
            body {
                background: #fff !important;
                padding: 0 !important;
                justify-content: flex-start;
            }
            .no-print { display: none !important; }
            .a4-container {
                box-shadow: none !important;
                border-radius: 0 !important;
                width: 210mm !important;
                min-height: 297mm !important;
                padding: 0 15mm !important;
            }
            h2, .section-title { color: #000 !important; }
            td:first-child { background: #f9f9f9 !important; }
        }
    </style>
</head>
<body>
    <div class="a4-container">
        <!-- Print & Back Buttons -->
        <div class="no-print mb-3 d-flex justify-content-center gap-2">
            <button onclick="window.print()" class="btn btn-primary">🖨️ Print</button>
            <a href="{{ route('members.index') }}" class="btn btn-outline-secondary">⬅ Back</a>
        </div>

        <!-- Header -->
        <h2>Member Bio Data</h2>

        <!-- Passport -->
        <div class="text-center mb-3">
            @if (!empty($member->passport) && file_exists(public_path($member->passport)))
                <img src="{{ asset($member->passport) }}?v={{ filemtime(public_path($member->passport)) }}"
                     alt="Passport" class="passport">
            @else
                <img src="{{ asset('images/avatar.png') }}"
                     alt="No Passport" class="passport" style="opacity: 0.5;">
            @endif
        </div>

        <!-- Personal Information -->
        <div class="section-title">Personal Information</div>
        <table>
            <tr><td>Name</td><td>{{ $member->surname }} {{ $member->first_name }} {{ $member->middle_name }}</td></tr>
            <tr><td>Date of Birth</td><td>{{ $member->dob?->format('d M Y') }}</td></tr>
            <tr><td>Gender</td><td>{{ $member->gender }}</td></tr>
            <tr><td>Nationality</td><td>{{ $member->nationality }}</td></tr>
            <tr><td>State of Origin</td><td>{{ $member->state_of_origin }}</td></tr>
            <tr><td>LGA</td><td>{{ $member->lga }}</td></tr>
            <tr><td>Tribe</td><td>{{ $member->tribe }}</td></tr>
        </table>

        <!-- Parish Information -->
        <div class="section-title">Parish Information</div>
        <table>
            <tr><td>Home Diocese</td><td>{{ $member->home_diocese }}</td></tr>
            <tr><td>Home Parish</td><td>{{ $member->home_parish }}</td></tr>
            <tr><td>Last Parish Residence</td><td>{{ $member->last_parish_residence }}</td></tr>
        </table>

        <!-- Contact -->
        <div class="section-title">Contact</div>
        <table>
            <tr><td>Address</td><td>{{ $member->residential_address }}</td></tr>
            <tr><td>Phone</td><td>{{ $member->phone }}</td></tr>
            <tr><td>Email</td><td>{{ $member->email }}</td></tr>
        </table>

        <!-- Occupation -->
        <div class="section-title">Occupation</div>
        <table>
            <tr><td>Occupation</td><td>{{ $member->occupation }}</td></tr>
            <tr><td>Business Address</td><td>{{ $member->business_address }}</td></tr>
        </table>

        <!-- Family -->
        <div class="section-title">Family</div>
        <table>
            <tr><td>Marital Status</td><td>{{ $member->marital_status }}</td></tr>
            <tr><td>Spouse Name</td><td>{{ $member->spouse_name }}</td></tr>
            <tr><td>Spouse Phone</td><td>{{ $member->spouse_phone }}</td></tr>
            <tr><td>Next of Kin</td><td>{{ $member->next_of_kin }}</td></tr>
            <tr><td>Next of Kin Phone</td><td>{{ $member->next_of_kin_phone }}</td></tr>
        </table>

        <!-- Sacraments -->
        <div class="section-title">Sacraments</div>
        <table>
            <tr><td>Baptism</td><td>{{ $member->baptism ? 'Yes' : 'No' }}</td></tr>
            <tr><td>Communion</td><td>{{ $member->communion ? 'Yes' : 'No' }}</td></tr>
            <tr><td>Confirmation</td><td>{{ $member->confirmation ? 'Yes' : 'No' }}</td></tr>
        </table>

        <!-- Groups -->
        <div class="section-title">Groups</div>
        <table>
            <tr><td>Groups</td><td>{{ $member->groups }}</td></tr>
        </table>
    </div>
</body>
</html>
