<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Official Sanad &bull; {{ $certCode }}</title>
<style>
    @page {
        size: a4 landscape;
        margin: 6mm 7mm;
    }
    * {
        box-sizing: border-box;
    }
    body {
        font-family: 'DejaVu Serif', Georgia, serif;
        margin: 0;
        padding: 0;
        background-color: #FAF9F5;
        color: #14261F;
    }
    table.cert-outer {
        width: 100%;
        border-collapse: collapse;
        border: 4px solid #C9A35A;
        background-color: #FFFFFF;
    }
    table.cert-inner {
        width: 100%;
        border-collapse: collapse;
        border: 1.5px solid #063D2E;
        background-color: #FFFFFF;
    }
</style>
</head>
<body>

<table class="cert-outer" cellpadding="0" cellspacing="0">
    <tr>
        <td style="padding: 4px;">
            <table class="cert-inner" cellpadding="0" cellspacing="0">
                <!-- Row 1: Bismillah Inscription -->
                <tr>
                    <td style="padding: 12px 20px 4px 20px;" align="center">
                        <span style="font-size: 9px; color: #C9A35A;">&#9670;</span>
                        &nbsp;
                        <span style="font-size: 10.5px; color: #063D2E; font-weight: bold; letter-spacing: 2px;">
                            BISMILLAHIR RAHMANIR RAHEEM
                        </span>
                        &nbsp;
                        <span style="font-size: 9px; color: #C9A35A;">&#9670;</span>
                    </td>
                </tr>

                <!-- Row 2: University Logo Emblem -->
                <tr>
                    <td style="padding: 2px 20px 4px 20px;" align="center">
                        @if(!empty($logoBase64))
                            <img src="{{ $logoBase64 }}" width="46" height="46" style="border-radius: 6px; border: 1.5px solid #C9A35A;" alt="AL-TAQWA">
                        @endif
                    </td>
                </tr>

                <!-- Row 3: University Title -->
                <tr>
                    <td style="padding: 2px 20px 1px 20px;" align="center">
                        <span style="font-size: 20px; font-weight: bold; color: #063D2E; text-transform: uppercase; letter-spacing: 2px;">
                            AL-TAQWA INSTITUTE OF ISLAMIC STUDIES
                        </span>
                    </td>
                </tr>

                <!-- Row 4: Motto & Hadith -->
                <tr>
                    <td style="padding: 1px 20px 6px 20px;" align="center">
                        <span style="font-size: 9px; color: #9F7E3A; text-transform: uppercase; font-weight: bold; letter-spacing: 2.5px;">
                            Taleem &bull; Tarbiyah &bull; Tazkiyah
                        </span>
                        <br>
                        <span style="font-size: 8px; color: #5F7369; font-style: italic;">
                            &ldquo;Whoever travels a path in search of knowledge, Allah will make easy for him a path to Paradise.&rdquo; &mdash; Sahih Muslim
                        </span>
                    </td>
                </tr>

                <!-- Row 5: Plaque Banner -->
                <tr>
                    <td style="padding: 6px 20px;" align="center">
                        <table align="center" cellpadding="0" cellspacing="0" style="border-top: 1.5px solid #C9A35A; border-bottom: 1.5px solid #C9A35A; background-color: #FAF8F2;">
                            <tr>
                                <td align="center" style="font-size: 12.5px; font-weight: bold; color: #063D2E; text-transform: uppercase; padding: 3px 32px; letter-spacing: 2.5px;">
                                    SANAD &bull; CERTIFICATE OF COMPLETION
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Row 6: Attestation Line -->
                <tr>
                    <td style="padding: 6px 20px 2px 20px;" align="center">
                        <span style="font-size: 10px; color: #4A5568; font-style: italic;">
                            This is to solemnly attest and certify that
                        </span>
                    </td>
                </tr>

                <!-- Row 7: Student Name -->
                <tr>
                    <td style="padding: 3px 20px 6px 20px;" align="center">
                        <span style="font-size: 26px; font-weight: bold; color: #063D2E; border-bottom: 2px solid #C9A35A; padding: 0 36px 3px 36px; letter-spacing: 1px;">
                            {{ $studentName }}
                        </span>
                    </td>
                </tr>

                <!-- Row 8: Narrative -->
                <tr>
                    <td style="padding: 4px 70px 6px 70px;" align="center">
                        <span style="font-size: 9.5px; color: #4A5568; line-height: 1.4;">
                            has successfully fulfilled all prescribed academic coursework, live Halqa attendance mandates, and scholastic evaluations with distinction, and is hereby awarded graduation honors in
                        </span>
                    </td>
                </tr>

                <!-- Row 9: Course Title -->
                <tr>
                    <td style="padding: 4px 20px 8px 20px;" align="center">
                        <span style="font-size: 10px; color: #C9A35A;">&#9670;</span>
                        &nbsp;
                        <span style="font-size: 17px; font-weight: bold; color: #063D2E; letter-spacing: 0.5px;">
                            {{ $courseName }}
                        </span>
                        &nbsp;
                        <span style="font-size: 10px; color: #C9A35A;">&#9670;</span>
                    </td>
                </tr>

                <!-- Row 10: Metadata Card -->
                <tr>
                    <td style="padding: 4px 20px 12px 20px;" align="center">
                        <table align="center" cellpadding="0" cellspacing="0" style="background-color: #FAF8F2; border: 1px solid #E2D9C8;">
                            <tr>
                                <td style="font-size: 8.5px; color: #2D3748; padding: 3px 16px;">Department: <b style="color: #063D2E;">{{ $categoryName }}</b></td>
                                <td style="color: #C9A35A; padding: 3px 3px;">&bull;</td>
                                <td style="font-size: 8.5px; color: #2D3748; padding: 3px 16px;">Duration: <b style="color: #063D2E;">{{ $duration }}</b></td>
                                <td style="color: #C9A35A; padding: 3px 3px;">&bull;</td>
                                <td style="font-size: 8.5px; color: #2D3748; padding: 3px 16px;">Cohort: <b style="color: #063D2E;">{{ $cohort }}</b></td>
                                <td style="color: #C9A35A; padding: 3px 3px;">&bull;</td>
                                <td style="font-size: 8.5px; color: #14644A; padding: 3px 16px;"><b>Graduated with Honors</b></td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Row 11: Signatures and Rosette Seal -->
                <tr>
                    <td style="padding: 8px 30px 12px 30px;" align="center">
                        <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                            <tr>
                                <!-- Ustadh Column -->
                                <td width="35%" align="center" valign="bottom">
                                    <table width="175" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="center" style="height: 22px; vertical-align: bottom; font-size: 14px; font-style: italic; color: #1B4D3E; font-weight: bold; font-family: 'DejaVu Serif', serif;">
                                                Shaykh Ahmed
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: 1.2px solid #718096; height: 1px; font-size: 1px; line-height: 1px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding-top: 4px; font-size: 10px; font-weight: bold; color: #063D2E;">
                                                Ustadh &amp; Instructor
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="font-size: 8px; color: #5F7369; padding-top: 1px;">
                                                Faculty of Sacred Sciences &bull; AL-TAQWA
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <!-- Center Accredited Seal -->
                                <td width="30%" align="center" valign="middle">
                                    @if(!empty($sealBase64))
                                        <img src="{{ $sealBase64 }}" width="76" height="76" alt="Official Sanad Seal">
                                    @endif
                                </td>

                                <!-- Chancellor Column -->
                                <td width="35%" align="center" valign="bottom">
                                    <table width="175" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="center" style="height: 22px; vertical-align: bottom; font-size: 14px; font-style: italic; color: #1B4D3E; font-weight: bold; font-family: 'DejaVu Serif', serif;">
                                                Dr. M. Qasim
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: 1.2px solid #718096; height: 1px; font-size: 1px; line-height: 1px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding-top: 4px; font-size: 10px; font-weight: bold; color: #063D2E;">
                                                Academic Dean &amp; Chancellor
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="font-size: 8px; color: #5F7369; padding-top: 1px;">
                                                AL-TAQWA Institute of Islamic Studies
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Row 12: Security Footer -->
                <tr>
                    <td style="border-top: 1px solid #E2E8F0; padding: 6px 20px 8px 20px;">
                        <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                            <tr>
                                <td align="left" width="50%" style="font-size: 8px; color: #718096;">
                                    <span style="color: #C9A35A; font-size: 8px;">&#9670;</span>
                                    Certificate Ref: <b style="color: #063D2E;">{{ $certCode }}</b> &bull; Issued: <b>{{ $issueDate }}</b>
                                </td>
                                <td align="right" width="50%" style="font-size: 8px; color: #718096;">
                                    Verify Authenticity: <b style="color: #063D2E;">altaqwauniversity.com/verify-certificate/{{ $certCode }}</b>
                                    <span style="color: #C9A35A; font-size: 8px;">&#9670;</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
