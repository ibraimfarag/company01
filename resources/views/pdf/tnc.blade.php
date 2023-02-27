<html>
<head>
    <style>
        body {
            font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
            font-size: 10px;
        }
        /**
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin: 50px 0;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            color: white;
            text-align: right;
        }


        footer {  position:absolute; left: 0; bottom: -50px; right: 0;
            height: 70px;}
        footer .page:after { content: counter(page, upper-roman); }

        ol[type="1"] {
            background-color: #e6ecff;
            padding-top: 2px;
            padding-bottom: 2px;
        }
    </style>
</head>
<body>
<!-- Define header and footer blocks before your content -->
<header>
    <img src="{{ asset('public/img/pdf/logo.jpg') }}" width="100">
</header>

<h5 style="background-color:#21349e;padding: 5px; text-align: center; color: #fff;font-size: 12px">ACOTA STANDARD TERMS AND CONDITIONS </h5>
<br/>
{!! $content !!}

<footer>
    <hr/>
    <table border="0">
        <td width="80">
            <img src="{{asset('public/img/pdf/cpa.jpg')}}" width="100">
        </td>
        <td width="200">ACOTA Consulting PTY LTD<br/>is a CPA Practice<br/>
            ABN: 71 626 267 865  </td>
        <td width="200" style="text-align: right">
            PO Box 124, Coogee, NSW 2034<br/> <a href="mailto:info@acota.com.au">info@acota.com.au</a> <br/> <a href="www.acota.com.au">www.acota.com.au</a> <br/>+61 411 536 951
        </td>
    </table>
    <div class="text-center" style="width: 100%;text-align: center;font-weight: bold;">
        Liability limited by a scheme approved under Professional Standards Legislation
    </div>
    <div class="text-center" style="width: 100%;text-align: center;">
        <br/>
        Date downloaded: {{ \Carbon\Carbon::now()->format('Y-m-d') }}
    </div>
</footer>

<!-- Wrap the content of your PDF inside a main tag -->
<main>
</main>
</body>
</html>
