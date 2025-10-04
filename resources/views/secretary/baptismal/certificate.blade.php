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
        }

        .ornamental-border {
            position: absolute;
            inset: 0.5in;
            border: 3px double #8B4513;
            border-radius: 8px;
        }

        .inner-border {
            position: absolute;
            inset: 0.6in;
            border: 1px solid #D4AF37;
        }

        .header-section {
            text-align: center;
            padding-top: 0.8in;
        }

        .church-emblem {
            width: 1.5in;
            height: 1.5in;
            margin: 0 auto 0.2in;
        }

        .certificate-title {
            font-size: 28pt;
            font-weight: bold;
            color: #1a472a;
            margin-bottom: 0;
            letter-spacing: 2px;
        }

        .certificate-subtitle {
            font-size: 14pt;
            color: #8B4513;
            margin-bottom: 0.3in;
        }

        .certifies-text {
            font-size: 12pt;
            font-style: italic;
            margin-bottom: 0.25in;
        }

        .child-name {
            font-size: 24pt;
            font-weight: bold;
            text-decoration: underline;
            text-decoration-color: #D4AF37;
            text-underline-offset: 8px;
            margin: 0.25in 0;
            color: #1a472a;
        }

        .info-section {
            margin: 0.3in 1.2in;
            font-size: 11pt;
            line-height: 1.8;
        }

        .info-row {
            display: flex;
            margin-bottom: 0.15in;
            align-items: baseline;
        }

        .info-label {
            width: 2in;
            font-weight: 600;
            color: #1a472a;
        }

        .info-value {
            flex: 1;
            border-bottom: 1px solid #666;
            padding-bottom: 2px;
            color: #000;
        }

        .sacrament-details {
            margin: 0.25in 1.2in;
            padding: 0.2in;
            background: linear-gradient(to right, #f8f9fa, #ffffff, #f8f9fa);
            border-left: 4px solid #D4AF37;
            border-right: 4px solid #D4AF37;
        }

        .record-reference {
            margin: 0.25in 1.2in;
            padding: 0.15in;
            border: 2px solid #1a472a;
            border-radius: 4px;
            background: #f8f9fa;
            text-align: center;
        }

        .record-numbers {
            display: flex;
            justify-content: space-around;
            margin-top: 0.1in;
        }

        .record-item {
            text-align: center;
        }

        .record-item-label {
            font-size: 9pt;
            color: #666;
        }

        .record-item-value {
            font-size: 14pt;
            font-weight: bold;
            color: #1a472a;
        }

        .signature-section {
            margin: 0.4in 1.2in 0;
            display: flex;
            justify-content: space-between;
        }

        .signature-box {
            text-align: center;
            width: 2.5in;
        }

        .signature-line {
            border-top: 2px solid #000;
            margin-top: 0.6in;
            padding-top: 0.1in;
        }

        .signature-role {
            font-size: 11pt;
            font-weight: 600;
            color: #1a472a;
        }

        .footer-seal {
            position: absolute;
            bottom: 0.8in;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 9pt;
            color: #666;
        }

        .decorative-line {
            height: 2px;
            background: linear-gradient(to right, transparent, #D4AF37, transparent);
            margin: 0.15in 0;
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
                page-break-after: avoid;
            }
        }

        @media screen {
            body {
                background: #gray-100;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Print Button (Only visible on screen) -->
    <div class="no-print fixed top-4 right-4 z-50">
        <button onclick="window.print()" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">
            <i class="fas fa-print mr-2"></i>Print Certificate
        </button>
        <button onclick="window.close()" class="ml-2 bg-gray-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-700 transition">
            <i class="fas fa-times mr-2"></i>Close
        </button>
    </div>

    <div class="certificate-container">
        <!-- Ornamental Borders -->
        <div class="ornamental-border"></div>
        <div class="inner-border"></div>

        <!-- Header Section -->
        <div class="header-section">
            <!-- Church Logo/Emblem -->
            <div class="church-emblem">
                <img src="{{ asset('images/logo.jpg') }}" alt="Church Emblem" class="w-full h-full object-contain rounded-full border-4 border-yellow-600">
            </div>

            <div class="text-lg font-semibold" style="color: #1a472a; margin-bottom: 0.1in;">
                {{ $baptismal->church_name }}
            </div>

            <div class="decorative-line" style="width: 4in; margin: 0.15in auto;"></div>

            <div class="certificate-title">CERTIFICATE OF BAPTISM</div>
            <div class="certificate-subtitle">SACRAMENT OF HOLY BAPTISM</div>
        </div>

        <!-- Certifies Text -->
        <div class="certifies-text" style="text-align: center; padding: 0 1.5in;">
            This is to certify that
        </div>

        <!-- Child's Name -->
        <div class="child-name" style="text-align: center;">
            {{ strtoupper($baptismal->name) }}
        </div>

        <!-- Information Section -->
        <div class="info-section">
            <div class="info-row">
                <div class="info-label">Born on:</div>
                <div class="info-value">{{ $baptismal->birth_date?->format('F d, Y') }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Child of:</div>
                <div class="info-value">{{ $baptismal->fathers_name }} and {{ $baptismal->mothers_name }}</div>
            </div>
        </div>

        <!-- Sacrament Details -->
        <div class="sacrament-details">
            <div style="text-align: center; font-weight: 600; font-size: 11pt; color: #1a472a; margin-bottom: 0.15in;">
                Was Baptized on {{ $baptismal->baptism_date?->format('F d, Y') }}
            </div>

            <div class="info-section" style="margin: 0;">
                <div class="info-row">
                    <div class="info-label">Minister:</div>
                    <div class="info-value">{{ $baptismal->priest_name }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">Sponsor(s):</div>
                    <div class="info-value">
                        {{ $baptismal->sponsor }}{{ $baptismal->secondary_sponsor ? ', ' . $baptismal->secondary_sponsor : '' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Record Reference -->
        <div class="record-reference">
            <div style="font-size: 10pt; font-weight: 600; color: #1a472a; margin-bottom: 0.1in;">
                REGISTRY REFERENCE
            </div>
            <div class="record-numbers">
                <div class="record-item">
                    <div class="record-item-label">Book No.</div>
                    <div class="record-item-value">{{ $baptismal->book_number }}</div>
                </div>
                <div class="record-item">
                    <div class="record-item-label">Page No.</div>
                    <div class="record-item-value">{{ $baptismal->page_number }}</div>
                </div>
                <div class="record-item">
                    <div class="record-item-label">Line No.</div>
                    <div class="record-item-value">{{ $baptismal->line_number }}</div>
                </div>
            </div>
        </div>

        <!-- Signature Section -->
        <div class="signature-section">
            <div class="signature-box">
                <div class="signature-line">
                    <div class="signature-role">Parish Secretary</div>
                </div>
            </div>
            <div class="signature-box">
                <div class="signature-line">
                    <div class="signature-role">Parish Priest</div>
                </div>
            </div>
        </div>

        <!-- Footer Seal -->
        <div class="footer-seal">
            <div style="font-style: italic; margin-bottom: 0.05in;">
                Given at {{ $baptismal->church_name }}
            </div>
            <div>
                This {{ now()->format('jS') }} day of {{ now()->format('F, Y') }}
            </div>
            <div style="margin-top: 0.1in; font-size: 8pt;">
                <i class="fas fa-certificate" style="color: #D4AF37;"></i>
                Official Church Document
            </div>
        </div>
    </div>
</body>
</html>
