<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Email Confirmation</title>
    <style type="text/css">
        /* Take care of image borders and formatting, client hacks */
        img {
            max-width: 600px;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: none;
        }

        table {
            border-collapse: collapse !important;
        }

        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .backgroundTable {
            margin: 0 auto;
            padding: 0;
            width: 100% !important;
        }

        table td {
            border-collapse: collapse;
        }

        .ExternalClass * {
            line-height: 115%;
        }

        .container-for-gmail-android {
            min-width: 600px;
        }

        /* General styling */
        * {
            font-family: 'Helvetica Neue',Helvetica,Arial,Verdana,sans-serif;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            margin: 0 !important;
            height: 100%;
            color: #676767;
        }

        td {
            font-family: 'Helvetica Neue',Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
            color: #404040;
            text-align: left;
            line-height: 150%;
        }

        a {
            color: #676767;
            text-decoration: none !important;
        }

        .pull-left {
            text-align: left;
        }

        .pull-right {
            text-align: right;
        }

        .header-lg,
        .header-md,
        .header-sm {
            font-size: 32px;
            font-weight: 600;
            line-height: normal;
            padding: 35px 0 0;
            color: #4d4d4d;
        }

        .header-md {
            font-size: 24px;
        }

        .header-sm {
            padding: 5px 0;
            font-size: 18px;
            line-height: 1.3;
        }

        .content-padding {
            padding: 20px 0 5px;
        }

        .mobile-header-padding-right {
            width: 290px;
            text-align: right;
            padding-left: 10px;
        }

        .mobile-header-padding-left {
            width: 290px;
            text-align: left;
            padding-left: 10px;
            padding-bottom: 8px;
        }

        .free-text {
            width: 100% !important;
        }

        .button {
            padding: 30px 0;
        }

        .mini-block {
            border: 1px solid #e5e5e5;
            border-radius: 5px;
            background-color: #ffffff;
            padding: 12px 15px 15px;
            text-align: left;
            width: 253px;
        }

        .mini-container-left {
            width: 278px;
            padding: 10px 0 10px 15px;
        }

        .mini-container-right {
            width: 278px;
            padding: 10px 14px 10px 15px;
        }

        .product {
            text-align: left;
            vertical-align: top;
            width: 175px;
        }

        .total-space {
            padding-bottom: 8px;
            display: inline-block;
        }

        .item-table {
            padding: 50px 20px;
            width: 560px;
        }

        .item {
            width: 300px;
        }

        .mobile-hide-img {
            text-align: left;
            width: 125px;
        }

        .mobile-hide-img img {
            border: 1px solid #e6e6e6;
            border-radius: 4px;
        }

        .title-dark {
            text-align: left;
            border-bottom: 1px solid #cccccc;
            color: #4d4d4d;
            font-weight: 600;
            padding-bottom: 5px;
        }

        .item-col {
            padding-top: 20px;
            text-align: left;
            vertical-align: top;
        }

        .force-width-gmail {
            min-width: 600px;
            height: 0px !important;
            line-height: 1px !important;
            font-size: 1px !important;
        }

    </style>
    <style type="text/css" media="screen">
        @import url(http://fonts.googleapis.com/css?family=Oxygen:400,700);
    </style>
    <style type="text/css" media="screen">
        @media screen {
            /* Thanks Outlook 2013! http://goo.gl/XLxpyl */
            * {
                font-family: 'Oxygen', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
            }
        }
    </style>
    <style type="text/css" media="only screen and (max-width: 480px)">
        /* Mobile styles */
        @media only screen and (max-width: 480px) {

            table[class*="container-for-gmail-android"] {
                min-width: 290px !important;
                width: 100% !important;
            }

            img[class="force-width-gmail"] {
                display: none !important;
                width: 0 !important;
                height: 0 !important;
            }

            table[class="w320"] {
                width: 320px !important;
            }

            td[class*="mobile-header-padding-left"] {
                width: 160px !important;
                padding-left: 0 !important;
            }

            td[class*="mobile-header-padding-right"] {
                width: 160px !important;
                padding-right: 0 !important;
            }

            td[class="header-lg"] {
                font-size: 24px !important;
                padding-bottom: 5px !important;
            }

            td[class="content-padding"] {
                padding: 5px 0 5px !important;
            }

            td[class="button"] {
                padding: 5px 5px 30px !important;
            }

            td[class*="free-text"] {
                padding: 10px 18px 30px !important;
            }

            td[class~="mobile-hide-img"] {
                display: none !important;
                height: 0 !important;
                width: 0 !important;
                line-height: 0 !important;
            }

            td[class~="item"] {
                width: 140px !important;
                vertical-align: top !important;
            }

            td[class~="quantity"] {
                width: 50px !important;
            }

            td[class~="price"] {
                width: 90px !important;
            }

            td[class="item-table"] {
                padding: 30px 20px !important;
            }

            td[class="mini-container-left"],
            td[class="mini-container-right"] {
                padding: 0 15px 15px !important;
                display: block !important;
                width: 290px !important;
            }

        }
    </style>
</head>
<body bgcolor="#f7f7f7">
<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
    <tr>
        <td align="left" valign="top" width="100%" style="background:repeat-x url({{ $message->embed(public_path('images') . '/Eg_bg_top_02.jpg') }}) #ffffff;">
            <center>
                <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" background="{{ $message->embed(public_path('images') . '/Eg_bg_top_02.jpg') }}" style="background-color:transparent">
                    <tr>
                        <td width="100%" height="80" valign="top" style="text-align: center; vertical-align:middle;">
                            <!--[if gte mso 9]>
                            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:80px; v-text-anchor:middle;">
                                <v:fill type="tile" src="{{ $message->embed(public_path('images') . '/Eg_bg_top_02.jpg') }}" color="#ffffff"/>
                                <v:textbox inset="0,0,0,0">
                            <![endif]-->
                            <center>
                                <table cellpadding="0" cellspacing="0" width="600" class="w320">
                                    <tr>
                                        <td class="pull-left mobile-header-padding-left" style="vertical-align: middle;text-align: center">
                                            <a href=""><img width="167" height="35" src="{{ $message->embed(public_path('images') . '/new-eoa-logo.png') }}" alt="logo"></a>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                            <!--[if gte mso 9]>
                            </v:textbox></v:rect>
                            <![endif]-->
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
    <tr>
        <td align="left" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
            <center>
                <table cellspacing="0" cellpadding="0" width="700" class="w320">
                    <tr>
                        <td class="free-text">
                            Halo {{$user->first_name . ' ' . $user->last_name}}, <br> <br>

                            <a href="{{ url("auth/register/activate/{$user->getUserId()}/{$activationCode}") }}">{{ url("auth/register/activate/{$user->getUserId()}/{$activationCode}") }}</a> <br> <br>

                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
    <tr>
        <td align="center" valign="top" width="100%" style="background-color: #ffffff; height: 100px;">
            <center>
                <table cellspacing="0" cellpadding="0" width="700" class="w320">
                    <tr>
                        <td style="padding: 25px 0 25px;text-align: center">
                            <strong>EOA Solutions Limited</strong><br/>
                            Flat A, 8/F., Block 1,<br/>
                            Camelpaint Building, 62 Hoi Yuen Road, <br>
                            Kwun Tong, Kowloon, Hong Kong <br>
                            Tel: (852) 3568 6703 Fax: (852) 3914 8324 <br/>Email : <a href="mailto:info@eoasolutions.com">info@eoasolutions.com</a><br/>
                            Website: <a href="https://eoasolutions.com/">https://eoasolutions.com/</a>
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
</table>
</body>
</html>
