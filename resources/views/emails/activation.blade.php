@extends('email')

@section('content')
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td height="36" valign="top">

                <font face="arial" style="font-size: 16px; color: #2286c6; line-height: 24px;">
                    Hello {{ $user->first_name }},
                </font>
            </td>
        </tr>

        <tr>
            <td height="20" valign="top">&nbsp;

            </td>
        </tr>
        <tr>
            <td height="60" valign="top">

                <font face="arial" style="font-size: 16px; color: #2286c6; line-height: 24px;">
                    Thank you for registering with SB Vita.
                    Before we can activate your account one last step must be taken to complete your registration.
                </font>

            </td>
        </tr>

        <tr>
            <td height="30" valign="top">&nbsp;

            </td>
        </tr>

        <tr>
            <td  valign="top">

                <font face="arial" style="font-size: 16px; color: #2286c6; line-height: 24px;">
                    All you need to do is open the app and insert this code:
                    <font face="arial" style="font-size: 16px; color: #0000ff; line-height: 24px;"><strong>{{ $token }}</strong></font>
                </font>

            </td>
        </tr>
        <tr>
            <td height="60" valign="top">&nbsp;
            </td>
        </tr>
        <tr>
            <td height="100" valign="bottom">

                <font face="arial" style="font-size: 16px; color: #2286c6; line-height: 24px;">
                    Have a great day,<br>
                    The SB Vita team.
                </font>

            </td>
        </tr>

    </table>
@endsection