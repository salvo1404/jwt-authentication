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
                We're sorry you lost your game password so we made you a
                brand new one. Keep it safe or change it in your game  profile.
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
                This is your password:
                <font face="serif" style="font-size: 24px; color: #0000ff; line-height: 24px;"><strong>{{ $password }}</strong></font>
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
                The SB Vita team
            </font>

        </td>
    </tr>

</table>
@endsection