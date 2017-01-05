<?php
include '../../Library/SessionManager.php';
$session = new SessionManager();
if(isset($_GET['col'])) {
    $collection = $_GET['col'];
}
else header('Location: ../../');

require '../../Library/DBHelper.php';
require '../../Library/DateHelper.php';
require '../../Library/ControlsRender.php';
$Render = new ControlsRender();
$DB = new DBHelper();
$config = $DB->SP_GET_COLLECTION_CONFIG($collection);
$date = new DateHelper();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Input Form</title>
    <link rel = "stylesheet" type = "text/css" href = "../../Master/master.css" >
    <link rel="stylesheet" type="text/css" href="../../ExtLibrary/jQueryUI-1.11.4/jquery-ui.css">
    <script type="text/javascript" src="../../ExtLibrary/jQuery-2.2.3/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="../../ExtLibrary/jQueryUI-1.11.4/jquery-ui.js"></script>

</head>
<body>
<style>

    /*Account Stylesheet Adaptation from Collection Name */
    .Account{
        border-radius: 2%;
        box-shadow: 0px 0px 4px;
    }

    .Account_Table{
        background-color: white;
        padding: 3%;
        border-radius: 6%;
        box-shadow: 0px 0px 2px;
        margin: auto;
        font-family: verdana;
        text-align: left;
        margin-top: 2%;
        margin-bottom: 9%;

    }

    .Account_Table .Account_Title{
        margin-top: 2px;
        margin-bottom: 12px;
        color: #008852;
    }

    .Account_Table .Collection_data{
        width: 50%;
    }
    }
    #col1{float:left;width:460px;height:100%;padding-left:80px;}
    #col2{float:left;width:500px;height:100%;padding-left:5px;}
    #row{float:bottom;width:2000px;height:52px;background-color: #ccf5ff;}

    .cell
    {
        min-height: 45px;
    }

    .label
    {
        float:left;
        width:150px;
        min-width: 195px;
        padding-top:2px;
    }
    .labelradio
    {
        float:left;
        width:150px;
        min-width: 195px;
    }
    mark {
        background-color: #ccf5ff;
    }
    span.labelradio:hover p{
        z-index: 10;
        display: inline;
        position: absolute;
        border: 1px solid #000000;
        background: #bfe9ff;
        font-size: 14px;
        font-style: normal;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px; -o-border-radius: 3px;
        border-radius: 3px;
        -webkit-box-shadow: 4px 4px 4px #000000;
        -moz-box-shadow: 4px 4px 4px #000000;
        box-shadow: 4px 4px 4px #000000;
        width: 200px;
        padding: 10px 10px;
    }

</style>
<div id="wrap">
    <div id="main">
        <div id="divleft">
            <?php include '../../Master/header.php';
            include '../../Master/sidemenu.php' ?>
        </div>
        <div id="divright">
            <h2><?php echo $config['DisplayName'];?> Catalog Form</h2>
            <div id="divscroller">
                <table class="Account_Table">

                    <form id="theform" name="theform" method="post" enctype="multipart/form-data" >
                        <tr>
                            <td id="col1">
                                <div class="cell">
                                    <span class="label"><span style = "color:red;"> * </span>Library Index:</span>
                                    <input type = "text" name = "txtLibraryIndex" id = "txtLibraryIndex" size="26" value="" required />
                                </div>
                                <div class="cell">
                                    <span class="label"><span style = "color:red;"> * </span>Collection:</span>
                                    <input type = "text" name = "txtCollection" id = "txtCollection" size="26" value="" required />
                                </div>
                                <div class="cell">
                                    <span class="label"><span style = "color:red;"> * </span>Book Title:</span>
                                    <input type = "text" name = "txtBookTitle" id = "txtBookTitle" size="26" value="" />
                                </div>
                                <div class="cell">
                                    <span class="label">Job Number:</span>
                                    <input type = "text" name = "txtJobNumber" id = "txtJobNumber" size="26" value=""  />
                                </div>
                                <div class="cell">
                                    <span class="label">Job Title:</span>
                                    <input type = "text" name = "txtJobTitle" id = "txtJobTitle" size="26" value=""  />
                                </div>
                                <div class="cell">
                                    <span class="label">Indexed Page:</span>
                                    <input type = "text" name = "txtIndexedPage" id = "txtIndexedPage" size="26" value=""  />
                                </div>
                                <div class="cell">
                                    <span class="labelradio"><mark>Blank Page:</mark><p hidden><b></b>This is to signal if it is a Blank Page</p></span>
                                    <input type = "radio" name = "rbBlankPage" id = "rbBlankPage_yes" size="26" value="1" checked="true"/>Yes
                                    <input type = "radio" name = "rbBlankPage" id = "rbBlankPage_no" size="26" value="0"  />No
                                </div>
                                <div class="cell" >
                                    <span class="labelradio" ><mark>Sketch:</mark><p hidden><b></b>This is to signal if a Sketch is present</p></span>
                                    <input type = "radio" name = "rbSketch" id = "rbSketch_yes" size="26" value="1" checked="true"/>Yes
                                    <input type = "radio" name = "rbSketch" id = "rbSketch_no" size="26" value="0" />No
                                </div>
                                <div class="cell">
                                    <span class="labelradio"><mark>Loose Document:</mark><p hidden><b></b>This is to signal if it is a Loose Document</p></span>
                                    <input type = "radio" name = "rbLooseDocument" id = "rbLooseDocument_yes" size="26" value="1" checked="true"/>Yes
                                    <input type = "radio" name = "rbLooseDocument" id = "rbLooseDocument_no" size="26" value="0"  />No
                                </div>
                                <div class="cell">
                                    <span class="labelradio"><mark>Needs Review:</mark><p hidden><b></b>This is to signal if the Page needs to be reviewed by admin</p></span>
                                    <input type = "radio" name = "rbNeedsReview" id = "rbNeedsReview_yes" size="26" value="1" />Yes
                                    <input type = "radio" name = "rbNeedsReview" id = "rbNeedsReview_no" size="26" value="0" checked="true" />No
                                </div>
                                <div class="cell">
                                    <span class="label">Field Book Author:</span>
                                    <input type = "text" name = "txtBookAuthor" id = "txtBookAuthor" size="26" value=""  />
                                </div>
                                </div class="cell">
                                    <span class="label">Field Crew Member: </span>
                                        <input type = "text" name = "fieldcrewmember[]" id = "fieldcrewmember" size="24" value="" autocomplete="off" list="datalist_crew" /><input type="button" id="more_fields" onclick="add_fields();" value="+"/>
                                        <span id="crewcell"></span>
                                </div>
                            </td>
                            <td id="col2">
                                <div class="cell">
                                    <select name="ddlStartMonth" id="ddlStartMonth" style="width:60px">
                                        <?php $Render->GET_DDL_MONTH(null); ?>
                                    </select>
                                    <span class="label">Document Start Date:</span>
                                    <select name="ddlStartDay" id="ddlStartDay" style="width:60px">
                                        <?php $Render->GET_DDL_DAY(null); ?>
                                    </select>

                                    <select id="ddlStartYear" name="ddlStartYear" style="width:85px">
                                        <?php $Render->GET_DDL_YEAR(null); ?>
                                    </select>

                                </div>
                                <div class="cell">

                                    <select name="ddlEndMonth" id="ddlEndMonth" style="width:60px">
                                        <?php $Render->GET_DDL_MONTH(null); ?>
                                    </select>
                                    <span class="label">Document End Date:</span>
                                    <select name="ddlEndDay" id="ddlEndDay" style="width:60px">
                                        <?php $Render->GET_DDL_DAY(null); ?>
                                    </select>
                                    <select name="ddlEndYear" id="ddlEndYear" style="width:85px">
                                        <?php $Render->GET_DDL_YEAR(null); ?>
                                    </select>
                                </div>
                                <div class="cell">
                                    <span class="label">Comments:</span>
                                    <textarea name = "comments" rows = "5" cols = "35"/></textarea>
                                </div>
                                <div class="cell">
                                    <span class="label">Scan of Page:</span>
                                </div>
                                <div class='cell' style='text-align:center'><a href=".tif">(Click to download)</a><br><a href=".tif"><br><img src= .jpg  alt = error /></a></div>
                                <div class="cell" style="text-align: center;padding-top:20px">
                                    <span><input type="reset" id="btnReset" name="btnReset" value="Reset" class="bluebtn"/></span>
                                    <input type = "hidden" id="txtDocID" name = "txtDocID" value = "" />
                                    <input type = "hidden" id="txtAction" name="txtAction" value="catalog" />  <!-- catalog or review -->
                                    <input type = "hidden" id="txtCollection" name="txtCollection" value="<?php echo $collection; ?>" />
                                    <span>
                                    <?php if($session->hasWritePermission())
                                    {echo "<input type='submit' id='btnSubmit' name='btnSubmit' value='Upload' class='bluebtn'/>";}
                                    ?>
                                        <div class="bluebtn" id="loader" style="display: none;">
                                        Uploading
                                        <img style="width: 4%;;" src='../../Images/loader.gif'/></div>
                                </div>
                                </span>
                                <div class="cell" style="text-align: center" id="useredit">Last edited by: user</div>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../../Master/footer.php'; ?>

</body>
<script>
    $( document ).ready(function() {
        /* attach a submit handler to the form */
        $('#theform').submit(function (event) {
            /* stop form from submitting normally */
            var formData = new FormData($(this)[0]);
            /*jquery that displays the three points loader*/
            $('#btnSubmit').css("display", "none");
            $('#loader').css("display", "inherit");
            event.disabled;

            event.preventDefault();
            /* Send the data using post */
            $.ajax({
                type: 'post',
                url: 'form_processing.php',
                data:  formData,
                processData: false,
                contentType: false,
                success:function(data){
                    var json = JSON.parse(data);
                    var msg = "";
                    var result = 0;
                    for(var i = 0; i < json.length; i++)
                    {
                        msg += json[i] + "\n";
                    }
                    for (var i = 0; i < json.length; i++){
                        if (json[i].includes("Success")) {
                            window.close();
                            result = 1;
                        }
                        else if(json[i].includes("Fail") || json[i].includes("EXISTED"))
                        {
                            $('#btnSubmit').css("display", "inherit");
                            $('#loader').css("display", "none");
                        }
                    }
                    alert(msg);
                    if (result == 1){
                        window.location.href = "./catalog.php?col=<?php echo $_GET['col']; ?>";
                    }

                }
            });
        });
        //resize height of the scroller
        $("#divscroller").height($(window).outerHeight() - $(footer).outerHeight() - $("#page_title").outerHeight() - 55);
    });
</script>
<script>
    var max = 5;
    var crew_count = 0;
    function add_fields() {
        if(crew_count >= max)
            return false;
        crew_count++;
        var objTo = document.getElementById('crewcell');
        var divtest = document.createElement("div");
        divtest.innerHTML = '<br><div class="cell"><span class="label">Field Crew Member</span><input type = "text" name = "fieldcrewmember[]" autocomplete="off" id = "fieldcrewmember" size="26" value="" list="datalist_crew" />';

        objTo.appendChild(divtest)
    }
</script>

</html>