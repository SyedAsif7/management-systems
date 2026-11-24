<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Official Sanad & Certificate &mdash; {{ $certCode }}</title>
    <style>
        @page {
            size: a4 landscape;
            margin: 0;
        }
        body {
            font-family: 'DejaVu Serif', Georgia, serif;
            margin: 0;
            padding: 24px;
            background-color: #FAF9F5;
            color: #14261F;
            box-sizing: border-box;
            height: 100%;
        }
        .outer-border {
            border: 4px solid #C9A35A;
            padding: 6px;
            height: 94%;
            box-sizing: border-box;
            position: relative;
            background: #FFFFFF;
        }
        .inner-border {
            border: 1.5px solid #063D2E;
            padding: 20px 30px;
            height: 96%;
            box-sizing: border-box;
            text-align: center;
            position: relative;
        }
        .corner-ornament {
            position: absolute;
            width: 24px;
            height: 24px;
            line-height: 24px;
            font-size: 18px;
            color: #C9A35A;
            font-weight: bold;
        }
        .corner-tl { top: 4px; left: 6px; }
        .corner-tr { top: 4px; right: 6px; }
        .corner-bl { bottom: 4px; left: 6px; }
        .corner-br { bottom: 4px; right: 6px; }

        .logo-wrap {
            margin-bottom: 4px;
        }
        .logo-img {
            width: 64px;
            height: 64px;
            border-radius: 8px;
            border: 2px solid #C9A35A;
        }
        .bismillah {
            font-size: 18px;
            color: #063D2E;
            margin: 2px 0;
            letter-spacing: 1px;
        }
        .institute-title {
            font-size: 20px;
            font-weight: bold;
            color: #063D2E;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin: 0;
        }
        .institute-motto {
            font-size: 10px;
            color: #C9A35A;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 2px;
            margin-bottom: 12px;
        }
        .sanad-title-badge {
            display: inline-block;
            border-top: 1.5px solid #C9A35A;
            border-bottom: 1.5px solid #C9A35A;
            padding: 4px 30px;
            margin-bottom: 8px;
        }
        .sanad-title {
            font-size: 17px;
            font-weight: bold;
            color: #063D2E;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0;
        }
        .citation-text {
            font-size: 12px;
            color: #5F7369;
            font-style: italic;
            margin: 6px 0 4px;
        }
        .student-name {
            font-size: 26px;
            font-weight: bold;
            color: #063D2E;
            margin: 6px 0 4px;
            border-bottom: 1.5px solid #DFBA6B;
            display: inline-block;
            padding: 0 40px 4px;
            letter-spacing: 1px;
        }
        .completion-text {
            font-size: 11.5px;
            color: #4A5568;
            line-height: 1.5;
            max-width: 85%;
            margin: 6px auto;
        }
        .course-title {
            font-size: 18px;
            font-weight: bold;
            color: #063D2E;
            margin: 4px 0 2px;
            letter-spacing: 0.5px;
        }
        .course-meta {
            font-size: 11px;
            color: #718096;
            margin-bottom: 16px;
        }

        .signatures-table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }
        .signatures-table td {
            vertical-align: bottom;
            text-align: center;
        }
        .sig-line {
            width: 170px;
            border-bottom: 1px solid #718096;
            margin: 0 auto 4px;
        }
        .sig-name {
            font-size: 11px;
            font-weight: bold;
            color: #063D2E;
        }
        .sig-title {
            font-size: 9.5px;
            color: #718096;
        }
        .seal-box {
            display: inline-block;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px dashed #C9A35A;
            background: #FAF9F5;
            color: #063D2E;
            text-align: center;
            line-height: 66px;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .footer-verification {
            position: absolute;
            bottom: 8px;
            left: 30px;
            right: 30px;
            font-size: 9px;
            color: #718096;
            display: flex;
            border-top: 1px solid #E2E8F0;
            padding-top: 4px;
        }
        .footer-left {
            float: left;
            text-align: left;
            width: 50%;
        }
        .footer-right {
            float: right;
            text-align: right;
            width: 50%;
        }
    </style>
</head>
<body>

<div class="outer-border">
    <div class="inner-border">
        <!-- Corner Ornaments -->
        <div class="corner-ornament corner-tl">&#10022;</div>
        <div class="corner-ornament corner-tr">&#10022;</div>
        <div class="corner-ornament corner-bl">&#10022;</div>
        <div class="corner-ornament corner-br">&#10022;</div>

        <!-- Institutional Header & Logo -->
        <div class="logo-wrap">
            @if($logoBase64)
                <img src="{{ $logoBase64 }}" class="logo-img" alt="Emblem">
            @endif
        </div>
        <div class="bismillah">بِسْمِ ٱللَّهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ</div>
        <h1 class="institute-title">AL-TAQWA INSTITUTE OF ISLAMIC STUDIES</h1>
        <div class="institute-motto">Taleem &bull; Tarbiyah &bull; Tazkiyah</div>

        <!-- Sanad Title -->
        <div class="sanad-title-badge">
            <div class="sanad-title">SANAD &bull; CERTIFICATE OF COMPLETION</div>
        </div>

        <div class="citation-text">This is to solemnly attest and certify that</div>
        <div class="student-name">
            {{ $enrollment->student ? $enrollment->student->name : 'Talib-ul-Ilm' }}
        </div>

        <div class="completion-text">
            has successfully fulfilled all prescribed academic coursework, live Halqa attendance requirements, and rigorous scholastic evaluations for the conferment of graduation in
        </div>

        <div class="course-title">
            {{ $enrollment->course ? $enrollment->course->name : 'Islamic Studies Program' }}
        </div>
        <div class="course-meta">
            Academic Department: <b>{{ $enrollment->course && $enrollment->course->category ? $enrollment->course->category->name : 'Faculty of Islamic Sciences' }}</b> &bull;
            Duration: <b>{{ $enrollment->course ? $enrollment->course->duration_label : 'Certified' }}</b> &bull;
            Cohort: <b>{{ $enrollment->batch ? $enrollment->batch->name : 'Cohort 1' }}</b>
        </div>

        <!-- Signatures & Official Institute Seal -->
        <table class="signatures-table">
            <tr>
                <td style="width: 35%;">
                    <div class="sig-line"></div>
                    <div class="sig-name">Ustadh &amp; Instructor</div>
                    <div class="sig-title">Faculty of Sacred Sciences</div>
                </td>
                <td style="width: 30%;">
                    <div class="seal-box">
                        GOLD SEAL
                    </div>
                </td>
                <td style="width: 35%;">
                    <div class="sig-line"></div>
                    <div class="sig-name">Academic Dean &amp; Director</div>
                    <div class="sig-title">AL-TAQWA Institute of Islamic Studies</div>
                </td>
            </tr>
        </table>

        <!-- Verification Footer -->
        <div class="footer-verification">
            <div class="footer-left">
                Certificate Ref: <b>{{ $certCode }}</b> &bull; Issued: <b>{{ $issueDate }}</b>
            </div>
            <div class="footer-right">
                Verify Credential: <b>altaqwauniversity.com/verify-certificate/{{ $certCode }}</b>
            </div>
        </div>
    </div>
</div>

</body>
</html>
