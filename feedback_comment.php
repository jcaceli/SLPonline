<?
require "zxcd9.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SLP | HR</title>
    <meta name="description" content="SLP DSWD Livelihood"/>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="../slp.ph2/imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../slp.ph2/imgs/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../slp.ph2/css/flatbootstrap.css"/>
    <link rel="stylesheet" href="../slp.ph2/css/bootstrapValidator.css"/>
    <script src="../slp.ph2/js/jquery-1.10.2.min.js"></script>
    <script src="../slp.ph2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../slp.ph2/js/bootstrapValidator.js"></script>
 
    <link rel="stylesheet" href="../slp.ph2/css/pikaday.css"/>


    <link rel="stylesheet" type="text/css" href="../slp.ph2/css/DTbootstrap.css">


    <link href="../slp/ph2/css/jquery.tagit.css" rel="stylesheet" type="text/css">



    <link href="../slp.ph2/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">


    <script type="text/javascript" src="../slp.ph2/js/jquery.dataTables.js"></script>

    <script src="../slp.ph2/js/DTbootstrap.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>


    <script src="../slp.ph2/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="http://momentjs.com/downloads/moment.min.js"></script>
 


    <style>


body {
    background-color: #f7f9fb;
    background-size: cover;
    font-family: "Lato";
}
.navbar-nav > li > a, .navbar-brand {
    padding-top:15px !important; 
    padding-bottom:0 !important;
    height: 45px;
}
.navbar {min-height:45px !important;background-color: #000}
#bootstrapSelectForm .selectContainer .form-control-feedback {
    right: -15px;
}
.fileUpload {
    position: relative;
    overflow: hidden;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.successcontent {
  display: none;
}
.cleanselect {
  -webkit-appearance:none;-moz-appearance:none;-ms-appearance:none;appearance:none;background:#fff url(../slp.ph2/imgs/arrows.png) no-repeat right 9px;
}
.disabled {
  background:rgba(1,1,1,0.2);
  border:0px solid;
  cursor:progress;
}
.spin {
  -webkit-animation: spin 1000ms infinite linear;
  -moz-animation: spin 1000ms infinite linear;
  -o-animation: spin 1000ms infinite linear;
  animation: spin 1000ms infinite linear;
}

@-moz-keyframes spin {
  from {
    -moz-transform: rotate(0deg);
  }
  to {
    -moz-transform: rotate(360deg);
  }
}

@-webkit-keyframes spin {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

.autocomplete-suggestions { cursor:pointer;border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
.autocomplete-suggestion { cursor:pointer;padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-no-suggestion { padding: 2px 5px;}
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: bold; color: #000; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { font-weight: bold; font-size: 16px; color: #000; display: block; border-bottom: 1px solid #000; }

.spinner {
  margin: 20px auto 0;
  width: 90px;
  text-align: center;
}

.spinner > div {
  width: 20px;
  height: 50px;
  background-color: #333;
  border-radius: 10px;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.6s infinite ease-in-out both;
  animation: sk-bouncedelay 1.6s infinite ease-in-out both;
}

.spinner .bounce1 {
    background: #ff3030;
  -webkit-animation-delay: -1.2s;
  animation-delay: -1.2s;
}

.spinner .bounce2 {
    background: #fee123;
  -webkit-animation-delay: -0.8s;
  animation-delay: -0.8s;
}

.spinner .bounce3 {
    background: #0071ce;
  -webkit-animation-delay: -0.4s;
  animation-delay: -0.4s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0.0);
    transform: scale(0.0);
  } 40% { 
    -webkit-transform: scale(2.0);
    transform: scale(1.0);
  }
}
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 999999;
    background-color: rgba(255,255,255,0.8);
    text-align: center;
    vertical-align: middle;
}
.vcenter {
  min-height: 90%;  
  min-height: 90vh; 

  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex; 
  
    -webkit-box-align : center;
  -webkit-align-items : center;
       -moz-box-align : center;
       -ms-flex-align : center;
          align-items : center;
  width: 100%;
         -webkit-box-pack : center;
            -moz-box-pack : center;
            -ms-flex-pack : center;
  -webkit-justify-content : center;
          justify-content : center;
}


#slideout {
      position: fixed;
      top: 25%;
      left: 0;
      width: 35px;
      padding: 12px 0;
      text-align: center;
      background: #6DAD53;
      -webkit-transition-duration: 0.3s;
      -moz-transition-duration: 0.3s;
      -o-transition-duration: 0.3s;
      transition-duration: 0.3s;
      -webkit-border-radius: 0 5px 5px 0;
      -moz-border-radius: 0 5px 5px 0;
      border-radius: 0 5px 5px 0;
    }
    #slideout_inner {
      position: fixed;
      top: 25%;
      left: -250px;
      background: #6DAD53;
      width: 250px;
      padding: 0;
      height: 165px;
      -webkit-transition-duration: 0.3s;
      -moz-transition-duration: 0.3s;
      -o-transition-duration: 0.3s;
      transition-duration: 0.3s;
      text-align: left;
      -webkit-border-radius: 0 0 5px 0;
      -moz-border-radius: 0 0 5px 0;
      border-radius: 0 0 5px 0;
    }
    #slideout_inner textarea {
      width: 190px;
      height: 100px;
      margin-bottom: 6px;
    }
    #slideout:hover {
      left: 250px;
    }
    #slideout:hover #slideout_inner {
      left: 0;
    }
</style>
</head>
<body>


<?php
include "nav.php";

if ($_SESSION['permlvl'] < 1) {
  echo "<div class='container-fluid'><div class='col-md-offset-2 col-md-8' style='margin-top:5em;text-align:center'><img src='../ imgs/search.png'><br><br>Access to this function is only available to <b>HR focals.</b><br>If you believe you should have access to this, please send an email to jmodelacruz@e-dswd.net.";
  die;
}

?>
<script type="text/javascript" ></script>


<!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog" style="margin-top:3em">
        <div class="modal-dialog modal-sm">

          <div class="modal-content" style="padding:1em;padding-top:0.5em;">
                  <h3 style="color:#5cb85c;margin-bottom:6px">Feedback sent!</h3>
                  <span style="font-size:13px" id="sucsubtext">Kindly wait for the response of the administrator, Thank you.</span><br><br>
                  <button type="button" class="btn btn-primary pull-right" style="background:#5cb85c;border:0;margin-top:0;padding:5px 10px 5px 10px" id="okaybtn" data-dismiss="modal">Okay</button>
                  <div class="clearfix"></div>
          </div>
          
        </div>
      </div>
      <!-- Modal -->

      <div class="loader vcenter" style="display:none;" id="loadoverlay">
    <div class="spinner" style="margin-top:-2em;text-align:center">
      <h3 style="font-weight:normal;display:block">Sending..</h3><br>
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>

</div>

<div class="container-fluid">
    <div class="row">
      <!--ifsuccess-->
    <!--  <div class="col-md-offset-2 col-md-8 successcontent">
        <center>
          <br><font size="70px" color="#5cb85c"><img src="../slp.ph2/imgs/upload.png">
          <br>Success!</font>
          <br><font size="4px">Your input has been added to the database.</font>
          <br><br><button class="btn btn-success" id="btnAddnew">Add new record</button>
      </div> -->
      <!--end ifsuccess-->
        <div class="col-md-offset-2 col-md-8" id="maincontent">
            <div class="row">
              <div class="col-sm-12" role="alert" style="border:0px solid;padding:5px 0px 15px 0px;font-size:20px">
                <center><img src="../slp.ph2/imgs/slplogo_med.png" width="100em"><br>
                FEEDBACK FORM
              </div>
            </div>
<script>
var sex;
function ismale() {
  sex = "0";
  console.log(sex);
}
function isfemale() {
  sex = "1";
  console.log(sex);
}

</script>
<form class="form-horizontal" id="hrForm" method="post" action="" autocomplete="off">
                          <div class="form-group">
                            <label for="typeofcomm" class="col-sm-2 control-label">Type of Communication</label>
                            <div class="col-sm-10">
                              <select class="form-control cleanselect" name="typeofcomm" id="typeofcomm">
                                        <option value="" selected>Select your type</option>
                                        <option value="Feedback for system">Feedback for system</option>
                                        <option value="Grievance">Grievance</option>
                                        <option value="Questions regarding the system">Questions regarding the system</option>
                                        <option value="Questions regarding the SLP process">Questions regarding the SLP process</option>
                                      </select>
                            </div>
                          </div>


                          <div class="form-group">
                            <label for="subject" class="col-sm-2 control-label">Subject</label>
                            <div class="col-sm-10">
                              <input name="subject" class="form-control" id="subject" placeholder="">
                            </div>
                          </div>
                      
                      <div class="form-group">
                            <label for="remarks" class="col-sm-2 control-label">Comments and Suggestions</label>
                            <div class="col-sm-10">
                              <textarea name="remarks" class="form-control" id="remarks" placeholder="" rows="15" ></textarea>
                            </div>
                      </div><br>
          

                          <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="col-sm-4" style="text-align:right;vertical-align:middle;padding-top:7px">
                                
                              </div>
                              <div class="col-sm-8">
                                </form>
                                <button id="hrsubmit" class="btn col-sm-12 btn-success has-feedback" style="font-size:18px">Submit</button>
                                <div id="statusdisp" class="col-sm-12" style="color:red;text-align:center"></div>
                              </div>
                            </div>
                          </div>
                      

<script>

/*function getProv() {
  console.log("asd");
  var formData = { 
    'action' : 'province',
    'regionid' : $('#region option:selected').val()
  };
  $.ajax({
  type: "POST",
  url: "getLocations.php",
  data: formData,
  success: function(data) {
            $("#province").prop('disabled', false);
            $("#province").html(data);
        }

  });
}
function getCitymun() {
  var formData = { 
    'action' : 'citymun',
    'provid' : $('#province option:selected').val()
  };
  $.ajax({
  type: "POST",
  url: "getLocations.php",
  data: formData,
  success: function(data) {
            $("#municipality").prop('disabled', false);
            $("#municipality").html(data);
        }

  });
}
$(document).ready(function() {

$("#loadicon").hide();
$("#hrsubmit").click(function(event) {
  event.preventDefault();
  event.stopImmediatePropagation();
  $("#statusdisp").html('');
  $('#hrForm').bootstrapValidator('validate');
  return false;
}); //endHRSUBMIT

$('#btnAddnew').click(function() {
  location.reload();
  $('#hrForm').data('bootstrapValidator').resetForm(true);
  $('#hrForm').bootstrapValidator('resetForm', true);
  document.getElementById("hrsubmit").disabled = false;
  document.getElementById("hrsubmit").classList.remove("disabled");
  $("#hrsubmit").html('Submit');
      $(".successcontent").hide();
      $("#maincontent").show();

});//endreset 

});//end DOC READY */ 
</script>
<script>
/*$(document).ready(function() {
  $("#loadicon2").hide();
  $("#sendfeedback").click(function(event) {
    event.preventDefault();
    event.stopImmediatePropagation();
    
    $("#loadicon2").show();
    $("#feedback").hide();
    $("#sendfeedback").html('Processing..');
    document.getElementById("sendfeedback").classList.add("disabled");
    document.getElementById("sendfeedback").disabled = true;
    var formData = {
      'page'        : "add_index",
      'feedback'    : $('textarea[name=feedback]').val(),
      'feedbacker'    : "<?php echo $_SESSION['id']; ?>"
    };
                $.ajax({
                   url: "../sendfeedback.php",
                   type: "POST",
                   data: formData,
                   success: function(data)
                   {
                      if (data == "good") {
                        $("#loadicon2").hide();
                        document.getElementById("formz").innerHTML = "<div style='padding:10px;color:#fff'><h2>Feedback Sent!</h2>Thank you!</div>"
                      } else {
                        alert(data);
                        $("#loadicon2").hide();
                        $("#feedback").show();
                        $("#sendfeedback").html('Submit');
                        document.getElementById("sendfeedback").classList.remove("disabled");
                        document.getElementById("sendfeedback").disabled = false;
                      }
                      return false;
                   }
                });//endAjax
  }); //endHRSUBMIT
}); //enddocready  */


// submit BUTTON feedback

$("#hrsubmit").click(function(event) {
    if ($('#typeofcomm option:selected').val() == "") {
      alert("Please select your type of communication.");
      return false;
    }
    if ($('input[name=subject]').val() == "") {
      alert("Please enter a subject.");
      return false;
    }
    if ($('textarea[name=remarks]').val() == "") {
      alert("Please enter your comments and suggestions.");
      return false;
    }



  if ($('#typeofcomm option:selected').val() == "Feedback for system" || $('#typeofcomm option:selected').val() == "Grievance" ) {
     
    $("#loadoverlay").show();
     var fd = new FormData;                  
     fd.append('action', 'submitcomment');
     fd.append('typeofcomm', $('#typeofcomm option:selected').val());
     fd.append('subject',$('input[name=subject]').val());
     fd.append('remarks', $('textarea[name=remarks]').val());
     $.ajax({
                url: 'feedback_save.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: fd,                         
                type: 'POST',
               success: function(data){

                  $("#loadoverlay").hide();

                    if (data=="Success") {
                      $('#myModal').modal();
                      $('#myModal').on('hidden.bs.modal', function () {

                          location.href = "feedback_comment.php";
                      })
                    } else {
                      alert(data);
                    }
                }
      });
     

    }
    else
    {
 $("#loadoverlay").show();
     var fd = new FormData;                  
     fd.append('action', 'submitcomment1');
     fd.append('typeofcomm', $('#typeofcomm option:selected').val());
     fd.append('subject',$('input[name=subject]').val());
     fd.append('remarks', $('textarea[name=remarks]').val());
     $.ajax({
                url: 'feedback_save.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: fd,                         
                type: 'POST',
               success: function(data){

                  $("#loadoverlay").hide();

                    if (data=="Success") {
                      $('#myModal').modal();
                      $('#myModal').on('hidden.bs.modal', function () {

                          location.href = "feedback_comment.php";
                      })
                    } else {
                      alert(data);
                    }
                }
      });

    }




}); 


</script>

</body>
</html>
