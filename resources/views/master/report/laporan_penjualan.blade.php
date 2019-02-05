<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Laporan Penjualan</title>
    <style media="screen">
        body {
            font-family: 'Segoe UI','Microsoft Sans Serif',sans-serif;
        }

        header:before, header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .invoiceNbr {
            font-size: 40px;
            margin-right: 30px;
            margin-top: 30px;
            float: right;
        }

        .logo {
            float: left;
        }

        .from {
            float: left;
        }

        .to {
            float: right;
        }

        .fromto {
            border-style: solid;
            border-width: 1px;
            border-color: #e8e5e5;
            border-radius: 5px;
            margin: 20px;
            min-width: 200px;
        }

        .fromtocontent {
            margin: 10px;
            margin-right: 15px;
        }

        .panel {
            background-color: #e8e5e5;
            padding: 7px;
        }

        .items {
            clear: both;
            display: table;
            padding: 20px;
        }

        /* Factor out common styles for all of the "col-" classes.*/
        div[class^="col-"] {
            display: table-cell;
            padding: 7px;
        }

        /*for clarity name column styles by the percentage of width */
        .col-1-10 {
            width: 10%;
        }

        .col-1-52 {
            width: 52%;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }

        button{
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>

    <style media="print">
        body {
            font-family: 'Segoe UI','Microsoft Sans Serif',sans-serif;
        }

        header:before, header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .invoiceNbr {
            font-size: 30pt;
            margin-right: 30pt;
            margin-top: 30pt;
            float: right;
        }

        .logo {
            float: left;
        }

        .from {
            float: left;
        }

        .to {
            float: right;
        }

        .fromto {
            border-style: solid;
            border-width: 1pt;
            border-color: #e8e5e5;
            border-radius: 5pt;
            margin: 20pt;
            min-width: 200pt;
        }

        .fromtocontent {
            margin: 10pt;
            margin-right: 15pt;
        }

        .panel {
            background-color: #e8e5e5;
            padding: 7pt;
        }

        .items {
            clear: both;
            display: table;
            padding: 20pt;
        }

        div[class^="col-"] {
            display: table-cell;
            padding: 7pt;
        }

        .col-1-10 {
            width: 10%;
        }

        .col-1-52 {
            width: 52%;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }

        button{
            display: none;
        }
</style>
    <link rel="stylesheet" href="{{asset('/vendors/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>
<header>
    <div class="logo">
        <img src="{{asset('/images/apotik.png')}}" alt="generic business logo" height="181" width="167" />
    </div>
    <div class="invoiceNbr">
        REPORT
        <br />
        PEMBELIAN
        <br />
        <button onclick="print()" class="btn btn-primary btn-sm" style="margin-top: 10px">
            <i class="fa fa-print"></i> Cetak
        </button>
        <a href="{{route('selectPembelian')}}"><button class="btn btn-warning" style="margin-top: 10px; background-color: #95a029; border-color: #95a029">
            <i class="fa fa-backward"></i> Kembali
        </button></a>
    </div>
</header>
<div class="fromto from">
    <div class="panel">Tanggal Cetak</div>
    <div class="fromtocontent">
        <span>{{date("d/M/Y")}}</span>
    </div>
</div>



<div class="fromto to">
    <div class="panel">Rentan Tanggal</div>
    <div class="fromtocontent">
        <span>{{date('d/M/Y', strtotime($first_date))}}</span>
        <span> - {{date('d/M/Y', strtotime($last_date))}}</span><br />
    </div>
</div>

<section class="items">

    <div class="row">
        <div class="col-1-10 panel">
            Tanggal
        </div>
        <div class="col-1-10 panel">
            Nama Obat
        </div>
        <div class="col-1-10 panel">
            Nama Dokter
        </div>
        <div class="col-1-10 panel">
            Harga Obat
        </div>
        <div class="col-1-10 panel">
            Qty
        </div>
        <div class="col-1-10 panel">
            Total
        </div>
    </div>

    @foreach($data as $datas)
    <div class="row">
        <div class="col-1-10">
            {{date('d-M-Y', strtotime($datas->tanggal_penjualan))}}
        </div>
        <div class="col-1-52">
            {{$datas->nama_obat}}
        </div>
        <div class="col-1-52">
            {{$datas->nama_dokter}}
        </div>
        <div class="col-1-10">
            {{' Rp.'.number_format($datas->harga_jual,2)}}
        </div>
        <div class="col-1-10">
            {{$datas->qty}}
        </div>
        <div class="col-1-10">
            {{' Rp.'.number_format(($datas->harga_jual)*($datas->qty),2)}}
        </div>
    </div>
    @endforeach

    <div class="row panel">
        <div class="col-1-10">

        </div>
        <div class="col-1-52">

        </div>
        <div class="col-1-10">

        </div>
        <div class="col-1-10">
            Jumlah Total:
        </div>
        <div class="col-1-10">

        </div>
        <div class="col-1-10">
            {{' Rp.'.number_format($jumlah,2)}}

        </div>
    </div>
</section>
</body>
<script src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(window).load(function() {
        window.print()
    })
</script>
</html>

