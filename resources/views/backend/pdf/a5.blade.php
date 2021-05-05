<html>
<head>
    <title> {{  __('Invoice') }} | {{ config('app.name') }}</title>
    <link href="{{ asset('assets/backend/pdf-css/invoice-a5.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<htmlpageheader name="page-header">
    <h1>Header</h1>
</htmlpageheader>

<h1>Body</h1>

<htmlpagefooter name="page-footer">
    <h1>Footer</h1>
</htmlpagefooter>
</body>
</html>
