<html>
<head>
    <title>Student Marksheet - {{ $sr->user->name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/my_print.css') }}" />
</head>
<body>
<div class="container">
    <div id="print" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        {{--    Logo N School Details--}}
        <table width="100%">
            <tr>
                <td><img src="{{ asset('assets/images/altaqwa-logo.png') }}" onerror="this.src='{{ asset('global_assets/images/altaqwa_emblem.jpg') }}'" style="max-height: 80px; border-radius: 8px;"></td>

                <td style="text-align: center; ">
                    <strong><span style="color: #063D2E; font-size: 25px;">{{ strtoupper(Qs::getSetting('system_name')) }}</span></strong><br/>
                    <strong><span
                                style="color: #063D2E; font-size: 15px;"><i>Taleem • Tarbiyah • Tazkiyah</i></span></strong><br/>
                    <strong><span style="color: #C9A35A; font-size: 15px;"> OFFICIAL ACADEMIC REPORT SHEET {{ '('.strtoupper($class_type->name).')' }}
                    </span></strong>
                </td>
                <td style="width: 100px; height: 100px; float: left;">
                    <img src="{{ $sr->user->photo }}"
                         alt="..."  width="100" height="100" style="border-radius: 6px; border: 1.5px solid #C9A35A;">
                </td>
            </tr>
        </table>
        <br/>

        {{--Background Logo--}}
        <div style="position: relative;  text-align: center; ">
            <img src="{{ asset('assets/images/altaqwa-logo.png') }}"
                 onerror="this.src='{{ asset('global_assets/images/altaqwa_emblem.jpg') }}'"
                 style="max-width: 450px; max-height:450px; margin-top: 60px; position:absolute; opacity: 0.08; margin-left: auto; margin-right: auto; left: 0; right: 0;" />
        </div>

        {{--<!-- SHEET BEGINS HERE-->--}}
@include('pages.support_team.marks.print.sheet')

        {{--Key to Grading--}}
        {{--@include('pages.support_team.marks.print.grading')--}}

        {{-- TRAITS - PSCHOMOTOR & AFFECTIVE --}}
        @include('pages.support_team.marks.print.skills')

        <div style="margin-top: 25px; clear: both;"></div>

        {{--    COMMENTS & SIGNATURE    --}}
        @include('pages.support_team.marks.print.comments')

    </div>
</div>

<script>
    window.print();
</script>
</body>

</html>
