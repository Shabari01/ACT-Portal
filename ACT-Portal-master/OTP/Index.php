<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<style type="text/css">
body {
padding: 0;
margin: 0;
}
*{
-webkit-box-sizing: border-box;
box-sizing: border-box;
-moz-box-sizing: border-box;
}
    #div1{
        min-height:30px;
        width:250px;
        display: none;
    }
    #file{
        display: none;
    }
    #display: {
        min-height:30px;
        width:250px;
        display: none;
    }
    #divCheckBox{
        min-height:30px;
        width:250px;
        display: none;

    }
input[type='text'] {
    width: 100%;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 4px;
margin-bottom: 10px;
}
    .btn1, button{
  background-color: #f4511e;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
}
.btn1:hover {opacity: 1}
#mailAlart{
    color: red;
    size: 19px;
    display: none;
}
#ShowVerify{
      min-height:300px;
        display: none;
}
#otpdiv{
         min-height:300px;
        min-width: 400px;
        display: none;
}
#uploadVideo{
     color: red;
    size: 19px;
    display: none;
}
center {
    width: 1200px;
    margin: 0 auto;
}
@media (max-width: 992px) {
center {
    width: 758px;
    margin: 0 auto;
}
}
@media (max-width: 767px) {
center {
    width: 100%;
    margin: 0 auto;
}
body {padding: 0 10px;}
}
</style>
<body>
<?php session_start(); ?>
<center>
    <h3>
    Welcome <?php  echo $_SESSION['username']; ?>

    </h3>
</center>
<center>
    <input type="button" name="upload" value="Upload" onclick="OTP()" id="uploadid" class="btn1"><br>
    <input type="button" name="display" value="display" onclick="displayFile()" class="btn1">
    <form action="logout.php" method="POST" >
    <input type="submit" name="logout" value="logout" class="btn1">    
    </form>
    
</center>
<center>
    <h1>
        <div id="div1">
    </h1>
    
        <div id="file">
     <form method="post" enctype="multipart/form-data" action="upload.php">
            <input type="file" name="file" class="btn1"><br><br>
            <input type="submit" name="name" value="upload" id="upload" class="btn1"  onclick="Alert()">
        </div>
    </form>
        <div id="display">
            
        </div>
        </div>
        
        <div id="divCheckBox">
        <p>OTP via </p>
            Email <input type="radio" name="otp" value="Email" id="mail"><br>
            Mobile <input type="radio" name="otp" value="OTP" id="otp"><br>
            <input type="button" name="upload" value="Upload " onclick="OTPgenerator()" id="uploadidNew" class="btn1">
        </div>
        <div id="mailAlart">
            <h2>
                Please Wait It's Take Some Time To Send Mail
            </h2>
        </div>
        <div id="ShowVerify">
<div >
    <div >
        <div >
            <br>
            <img src="https://cdn2.iconfinder.com/data/icons/luchesa-part-3/128/SMS-512.png" style="width:200px; height:200px;margin:0 auto;"><br>
            
            <h1 >Verify your mobile number</h1><br>
            <p style="align:center"></p><p> An OTP has been sent to your Mobile Number. Please enter the 4 digit OTP below for Successful Registration</p>  <p></p>
        <br>
       
            
                <div >                    
                <div >
                     <span style="color:red;"></span>    
                     <input type="text" name="otp" placeholder="Enter your OTP number" required="" id="otpidpredefined">
                </div>
                <button type="submit"  onclick="verifyPredefined()">Verify</button>
                </div>
            
              
            
        <br><br>
        </div>
    </div>        
</div>
</center>
<center>
      <div id="otpdiv">
                    
 </div>
 <div id="uploadVideo">
     <h3>
         Don't Refrash The Page While Uploading Your Video
     </h3>
 </div>
</center>
</body>
<script type="text/javascript">
function OTP(){
    document.getElementById('divCheckBox').style.display='block';
    document.getElementById('uploadid').style.visibility='hidden';
    document.getElementById('display').style.display='none';
}
function OTPgenerator(){
    if(document.getElementById('otp').checked){
        var ajax=new XMLHttpRequest();
        document.getElementById('uploadidNew').style.visibility='hidden';
        ajax.onreadystatechange=function () {
        if(ajax.status==200 && ajax.readyState==4){
        document.getElementById('display').style.display='none';
        document.getElementById('divCheckBox').style.display='block';
        document.getElementById('otpdiv').style.display='block';
       //document.getElementById('ShowVerify').style.display='block';
        document.getElementById('otpdiv').innerHTML=ajax.responseText;
        document.getElementById('divCheckBox').style.display='none';
        document.getElementById('mailAlart').style.display='none';
    }
    }
    ajax.open('GET','otp.php',true);
    ajax.send();
    }
    if(document.getElementById('mail').checked){
        var ajax=new XMLHttpRequest();
        
        ajax.onreadystatechange=function () {   
        document.getElementById('mailAlart').style.display='block';     
        document.getElementById('display').style.display='none';
        if(ajax.status==200 && ajax.readyState==4){
             if(ajax.responseText!='notsend'){
                alert('sendsuccessfully');
                document.getElementById('mailAlart').style.display='none'; 
                document.getElementById('ShowVerify').style.display='block';
               // document.getElementById('div').innerHTML=ajax.responseText;
                document.getElementById('divCheckBox').style.display='none';
             }
            //f(ajax.responseText!='sendsuccessfully'){  
            else{ 
                document.getElementById('ShowVerify').style.display='none';
                alert('Mail Not Send Try Again Once');
                document.getElementById('mailAlart').style.display='none';
                }  
        }   
}
    ajax.open('GET','mail.php',true);
    ajax.send();
}
}
function verify(){
        var otp=document.getElementById('otpid').value;
        var ajax=new XMLHttpRequest();
        ajax.onreadystatechange=function () {
        if(ajax.status==200 && ajax.readyState==4){
        document.getElementById('div1').style.display='block';
        if(ajax.responseText!='Incorrect OTP'){
        alert("successfull");
        document.getElementById('otpdiv').style.display='none';
        document.getElementById('display').style.display='none';
        document.getElementById('ShowVerify').style.display='none';
        document.getElementById('file').style.display='block';
        }
        else{
            alert('Incorrect OTP try Once');
        }
    }
    }
    ajax.open('GET','OTPverification.php?otp='+otp,true);
    ajax.send();
}
function verifyPredefined(){
        var otp=document.getElementById('otpidpredefined').value;
        var ajax=new XMLHttpRequest();
        ajax.onreadystatechange=function () {
        if(ajax.status==200 && ajax.readyState==4){
        document.getElementById('div1').style.display='block';
        if(ajax.responseText!='Incorrect OTP'){
        alert("successfull");
        document.getElementById('display').style.display='none';
        document.getElementById('ShowVerify').style.display='none';
        document.getElementById('file').style.display='block';
        }
        else{
            alert('Incorrect OTP try Once');
        }
    }
    }
    ajax.open('GET','OTPverification.php?otp='+otp,true);
    ajax.send();
}/*
function logout(){
    var ajax=new XMLHttpRequest();
    ajax.onreadystatechange=function () {
        if(ajax.status==200 && ajax.readyState==4){
            //alert('upload successfull');
        }
    }
    ajax.open('POST','logout.php',true);
    ajax.send();
}*/
function displayFile(){
 var ajax=new XMLHttpRequest();
    ajax.onreadystatechange=function () {
        if(ajax.status==200 && ajax.readyState==4){
         document.getElementById('file').style.display='none';
         document.getElementById('display').style.display='block';
         document.getElementById('display').innerHTML=ajax.responseText;
        }
    }
    ajax.open('GET','displayuservideo.php',true);
    ajax.send();      
}
function Alert(){
    document.getElementById('uploadVideo').style.display='block'; 
}
</script>
</html>