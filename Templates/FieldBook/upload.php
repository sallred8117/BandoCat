<?php
//Menu
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Welcome to BandoCat!</title>
    <link rel = "stylesheet" type = "text/css" href = "CSS/Map_Collection.css" >
    <link rel = "stylesheet" type = "text/css" href = "../../Master/master.css" >
    <script type="text/javascript" src="ExtLibrary/jQuery-2.2.3/jquery-2.2.3.min.js"></script>

</head>
<body>
<div id="wrap"></div>
<div id="main"></div>
<div id = "divleft">
    <?php include '../../Master/header.php';
    include '../../Master/sidemenu.php' ?>
</div>
<div id="divright">
    <h2>Document Upload</h2>
    <table class="Collection_Table">
        <tr>
            <td class="Collection_data">
                <input type="file" name="file_array[]" id="file_array" class="bluebtn" accept="image/tiff" value="Input Map Information" multiple/>
            </td>
        </tr>
        <tr>
            <td class="Collection_data" >
                <div id="selectedFilesDiv">
                    <table >
                        <thead><span style="font-family: Algerian; font: message-box;">Selected Files</span>
                        <tr>
                            <th>File Name</th>
                            <th>File Size</th>
                        </tr>
                        </thead>
                        <tbody id="selectedFilesTable">
                        <tr><td>No files selected</td></tr>
                        </tbody>
                        <tfoot id="selectedFilesTableFooter" style="background: #007F3E; color: white;"></tfoot>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td class="Collection_data">
                <input type="submit" class="bluebtn" value="Upload files" id="btnUpload"/>
            </td>
        </tr>
        <tr>
            <td>
                <p style="color:red; font-size: .45em"><br>*Recommended number of files for uploading: 70 files<br>If a file is more than 100MB, upload no more than 5 files simultaneously </p>
            </td>
        </tr>
    </table>
</div>


<script>
    var totalFsize = 0;

    document.addEventListener("DOMContentLoaded", init, false);

    function init() {
        document.querySelector('#file_array').addEventListener('change', handleFileSelect, false);
        selTable = document.querySelector("#selectedFilesTable");
        selTableFooter = document.querySelector("#selectedFilesTableFooter");
    }

    function handleFileSelect(e) {
        var total = 0;
        totalFsize = 0;
        if(!e.target.files) return;

        selTable.innerHTML = "";

        var files = e.target.files;
        for(var i=0; i<files.length; i++) {
            var f = files[i];
            totalFsize += f.size/1000000;
            total = totalFsize.toFixed(2);
            var row = selTable.insertRow(i);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML =  f.name;
            cell2.innerHTML =  (f.size/1000000).toFixed(2) + " mb"
        }
        var tableFooterLength = selTableFooter.rows.length;
        var row = selTableFooter.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML =  "Files ready for upload: " + files.length;
        cell2.innerHTML += "Total file size upload: " + total+" mb";

        if (tableFooterLength > 0){
            selTableFooter.deleteRow(1);
        }
    }

</script>

<style>
    nav{margin-left: 8px;
        margin-top: 22px;}
    ul{
        text-align: left;
        margin:auto;
    }
    #selectedFilesDiv table { border-collapse: collapse; text-align: start; width: 100%;padding-left:2px; }
    #selectedFilesDiv {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
    #selectedFilesDiv table td, #documentHistory table th { padding: 3px 10px; }
    #selectedFilesDiv table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1b77cb), color-stop(1, #125490) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 13px; font-weight: bold; border-left: 1px solid #0070A8; }
    #selectedFilesDiv table tbody td { color: #001326; border-left: 1px solid #E1EEF4;font-size: 11.56px;font-weight: normal; width: 50%}
    #selectedFilesDiv table tbody tr:hover { background-color: #bce1ff; }
    div#dhtmlx_window_active, div#dhx_modal_cover_dv { position: fixed !important; }

    #file_array{
        height:90%;
        padding: 1%;
        overflow: auto;
    }
    pre{
        tab-size: 4;
    }
    #btnUpload{
        height:100%}
    .bluebtn{
        font-size: 0.4em !important;
        padding-bottom: 24px;
    }

    #divright{
        font-size:45% !important;
        vertical-align: top;
        background: #f1f1f1;
        border-radius: 2%;
        box-shadow: 0px 0px 2px;
    }
    .Collection_Table .Collection_Button{
        font-size: 45% !important;
    }


</style>
<?php include '../../Master/footer.php'; ?>

</body>
</html>