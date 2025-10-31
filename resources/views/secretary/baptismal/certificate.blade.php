<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baptismal Certificate - {{ $baptismal->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @page {
            size: letter;
            margin: 0;
        }

        @page :first {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            print-color-adjust: exact;
            -webkit-print-color-adjust: exact;
        }

        .certificate-container {
            width: 8.5in;
            height: 11in;
            margin: 0 auto;
            position: relative;
            background: white;
            font-family: 'Times New Roman', serif;
            background-image: url('{{ asset('images/baptismal-pdf-bg.jpg') }}');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }

        .certificate-container-page2 {
            width: 8.5in;
            height: 11in;
            margin: 0 auto;
            position: relative;
            background: white;
            font-family: 'Times New Roman', serif;
        }

        .content-wrapper {
            position: relative;
            z-index: 1;
            padding: 1.2in 1.5in;
            text-align: center;
        }

        .content-wrapper-page2 {
            position: relative;
            z-index: 1;
            padding: 2in 1.5in;
            text-align: center;
        }

        .page-break {
            page-break-after: always;
            page-break-inside: avoid;
        }

        .church-header {
            margin-bottom: 0.4in;
        }

        .archdiocese {
            font-size: 11pt;
            color: #000;
            margin-bottom: 0.05in;
        }

        .parish-name {
            font-size: 13pt;
            font-weight: bold;
            color: #000;
            text-transform: uppercase;
            margin-bottom: 0.05in;
            letter-spacing: 0.5px;
        }

        .parish-address {
            font-size: 10pt;
            color: #000;
            margin-bottom: 0.3in;
        }

        .certificate-title {
            font-size: 18pt;
            font-weight: bold;
            color: #000;
            letter-spacing: 2px;
            margin-bottom: 0.25in;
            text-decoration: underline;
        }

        .certifies-text {
            font-size: 11pt;
            margin-bottom: 0.15in;
            color: #000;
        }

        .baptized-name {
            font-size: 16pt;
            font-weight: bold;
            color: #000;
            margin: 0.2in 0;
            text-transform: uppercase;
        }

        .body-text {
            font-size: 11pt;
            line-height: 1.8;
            color: #000;
            margin-bottom: 0.15in;
        }

        .emphasis-text {
            font-size: 12pt;
            font-weight: bold;
            color: #000;
            text-transform: uppercase;
            margin: 0.2in 0;
            line-height: 1.6;
        }

        .registry-text {
            font-size: 10pt;
            color: #000;
            margin: 0.2in 0;
            line-height: 1.6;
        }

        .issued-text {
            font-size: 10pt;
            color: #000;
            margin: 0.3in 0;
        }

        .signature-section {
            margin-top: 0.5in;
            text-align: center;
        }

        .priest-name {
            font-size: 12pt;
            font-weight: bold;
            color: #000;
            margin-bottom: 0.05in;
        }

        .priest-title {
            font-size: 11pt;
            color: #000;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none !important;
            }
            .certificate-container {
                page-break-after: always;
                page-break-inside: avoid;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .certificate-container-page2 {
                page-break-after: always;
                page-break-inside: avoid;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .page-break {
                page-break-after: always;
                page-break-inside: avoid;
            }
            @page {
                margin: 0;
                size: letter;
            }
        }

        @media screen {
            body {
                background: #e5e7eb;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Print Button (Only visible on screen) -->
    <div class="no-print fixed top-4 right-4 z-50">
        <button onclick="printCertificate()" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">
            <i class="fas fa-print mr-2"></i>Print Certificate
        </button>
        <button onclick="window.close()" class="ml-2 bg-gray-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-700 transition">
            <i class="fas fa-times mr-2"></i>Close
        </button>
    </div>

    <script>
        function printCertificate() {
            window.print();
        }
    </script>

    <div class="certificate-container page-break">
        <div class="content-wrapper">
            <!-- Church Header -->
            <div class="church-header">
                <div class="archdiocese">Archdiocese of Tuguegarao</div>
                <div class="parish-name">{{ strtoupper($baptismal->church_name) }}</div>
                <div class="parish-address">Sapping, Camalaniugan, Cagayan</div>
            </div>

            <!-- Certificate Title -->
            <div class="certificate-title">CERTIFICATE OF BAPTISM</div>

            <!-- Certifies Text -->
            <div class="certifies-text">This is to certify that</div>

            <!-- Baptized Name -->
            <div class="baptized-name">{{ strtoupper($baptismal->name) }}</div>

            <!-- Parent Information -->
            <div class="body-text">
                child of Mr. {{ $baptismal->fathers_name }}<br>
                and Ms. {{ $baptismal->mothers_name }}<br>
                born in {{ $baptismal->birth_place ?? 'Tuguegarao City, Cagayan' }}<br>
                on the {{ $baptismal->birth_date?->format('jS') }} day of {{ $baptismal->birth_date?->format('F Y') }}
            </div>

            <!-- Baptism Declaration -->
            <div class="emphasis-text">
                WAS SOLEMNLY BAPTIZED<br>
                ACCORDING TO THE RITES<br>
                OF THE ROMAN CATHOLIC CHURCH
            </div>

            <!-- Baptism Details -->
            <div class="body-text">
                on the {{ $baptismal->baptism_date?->format('jS') }} day of {{ $baptismal->baptism_date?->format('F Y') }}<br>
                by the Rev. Fr. {{ $baptismal->priest_name }}
            </div>

            <!-- Registry Reference -->
            <div class="registry-text">
                as it appears from the Baptismal Register Book<br>
                no. <strong>{{ $baptismal->book_number }}</strong>,
                Page no. <strong>{{ $baptismal->page_number }}</strong>,
                Line No. <strong>{{ $baptismal->line_number }}</strong>.
            </div>

            <!-- Issued Date -->
            <div class="issued-text">
                Issued on {{ now()->format('F j, Y') }} for General Purposes.
            </div>

            <!-- Signature Section -->
            <div class="signature-section">
                <div class="priest-name">Fr. {{ strtoupper($baptismal->priest_name ?? '') }}</div>
                <div class="priest-title">Parish Priest</div>
            </div>
        </div>
    </div>

    <!-- Second Page - Sponsors Only -->
    <div class="certificate-container-page2">
        <div class="content-wrapper-page2">
            <!-- Sponsors Section -->
            <div style="text-align: left; margin-left: 1.5in;">
                <div style="font-size: 14pt; font-weight: bold; margin-bottom: 0.5in;">SPONSORS:</div>

                <div style="font-size: 12pt; line-height: 2; color: #000;">
                    <div>• {{ $baptismal->sponsor }}</div>
                    @if($baptismal->secondary_sponsor)
                        <div>• {{ $baptismal->secondary_sponsor }}</div>
                    @endif
                </div>

                <div style="margin-top: 2in; font-size: 11pt; color: #000;">
                    NOTHING FOLLOWS..
                </div>
            </div>
        </div>
    </div>
</body>
</html>
