<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
            letter-spacing: 0.5px;
        }

        body {
            background-color: white;
        }

        .invoice-card {
            display: flex;
            flex-direction: column;
            position: absolute;
            padding: 10px 2em;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            min-height: 25em;
            width: 22em;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 10px 30px 5px rgba(0, 0, 0, 0.15);
        }

        .invoice-card > div {
            margin: 5px 0;
        }

        .invoice-title {
            flex: 3;
        }

        .invoice-title #date {
            display: block;
            margin: 8px 0;
            font-size: 12px;
        }

        .invoice-title #main-title {
            display: flex;
            justify-content: space-between;
            margin-top: 2em;
        }

        .invoice-title #main-title h4 {
            letter-spacing: 2.5px;
        }

        .invoice-title span {
            color: rgba(0, 0, 0, 0.4);
        }

        .invoice-details {
            flex: 1;
            border-top: 0.5px dashed grey;
            border-bottom: 0.5px dashed grey;
            display: flex;
            align-items: center;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table thead tr td {
            font-size: 12px;
            letter-spacing: 1px;
            color: grey;
            padding: 8px 0;
        }

        .invoice-table thead tr td:nth-last-child(1),
        .row-data td:nth-last-child(1),
        .calc-row td:nth-last-child(1)
        {
            text-align: right;
        }

        .invoice-table tbody tr td {
            padding: 8px 0;
            letter-spacing: 0;
        }

        .invoice-table .row-data #unit {
            text-align: center;
        }

        .invoice-table .row-data span {
            font-size: 13px;
            color: rgba(0, 0, 0, 0.6);
        }

        .invoice-footer {
            flex: 1;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .invoice-footer #later {
            margin-right: 5px;
        }

        .btn {
            border: none;
            padding: 5px 0px;
            background: none;
            cursor: pointer;
            letter-spacing: 1px;
            outline: none;
        }

        .btn.btn-secondary {
            color: rgba(0, 0, 0, 0.3);
        }

        .btn.btn-primary {
            color: cornflowerblue;
        }

        .btn#later {
            margin-right: 2em;
        }


    </style>
</head>
<body>
<div class="invoice-card">
    <div class="invoice-title">
        <div id="main-title">
            <h4>RECEIPT</h4>
            <span>{{$currentDate}}</span>
        </div>
    </div>

    <div class="invoice-details">
        <table class="invoice-table">
            <thead>
            <tr>
                <td>PRODUCT</td>
                <td>PRICE</td>
            </tr>
            </thead>

            <tbody>
            <tr class="row-data">
                <td>{{$user->subscription->plan->title}}</td>
                <td>£{{$user->subscription->plan->price}}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="invoice-footer">
        <p>Thanks!</p>
    </div>
</div>
</body>
</html>
