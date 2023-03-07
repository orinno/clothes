@foreach($transaksi as $item)
<!-- print -->
<script>
    function createPDF() {
        var sTable = document.getElementById('box').innerHTML;

        var style = "<style>";
        style = style + "* {font-size: 12px; font-family: sans-serif}";
        style = style + "table {width: 100%; margin-bottom: 3em; margin-top: 2em; font-size: 12px}";
        // style = style + "th {font-size: 12px}";
        style = style + "tr {vertical-align: top}";
        style = style + ".uraian {text-align: left}";
        style = style + ".body {margin-left: 3rem; margin-right: 3rem}";
        style = style + ".mb-2 {margin-bottom: 2em}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse; border-color: black;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + ".dt-button {display: none}";
        style = style + ".dataTables_length {display: none}";
        style = style + ".dataTables_info {display: none}";
        style = style + ".dataTables_filter {display: none}";
        style = style + ".dataTables_paginate {display: none}";
        style = style + "#tbl_filter {display: none}";
        style = style + "#lap_kinerja_filter {display: none}";
        style = style + ".title {text-align: center; margin: 0; padding: 0;}";
        style = style + ".title-1 {font-size: 16}";
        style = style + ".title-1 {font-size: 14}";
        style = style + ".ttd {display: flex; justify-content: space-around;}";
        style = style + ".box-ttd {text-align: center; margin-right: 2em;}";
        style = style + ".nama {margin-top: 5em; text-decoration: underline; font-weight: bold;}";
        style = style + "p {margin: 0;}";
        style = style + ".hiden {display: none;}";
        style = style + ".show {display: table-cell;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Laporan Kinerja <?= date('F Y') ?></title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write('<h1 class="title title-1 m-0 p-0"">Aplikasi Laundry</h1>');
        win.document.write('<h4 class="title title-2 m-0 p-0"">Jl. Jenderal Sudirman No. 269 Ciamis 46215, Tel. (0265) 771204 Fax: (0265) 777719</h4>');
        win.document.write('<hr> <br>');
        win.document.write('<h3 class="title mb-2">LAPORAN TRANSAKSI LAUNDRY</h3> <br>');
        win.document.write('<div class="container"></div>');
        // win.document.write('<p class="p-0 m-0">Dari Tanggal: .'$dari_tgl'. - .'$sampai_tgl'.</p>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</div>');     
        win.document.write('</div></body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
@endforeach