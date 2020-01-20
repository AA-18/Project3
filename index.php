<?php
$error="";
$success="";
  if($_POST){
      
      if(!$_POST["email"]){
          $error.="An email address is required<br>";
      }
      if(!$_POST["subject"]){
        $error.="The subject is required<br>";
    }
    if(!$_POST["content"]){
        $error.="The content is required<br>";
    }
    if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)=== false) {
        $error.="The email address is invalid.<br>";
    }
    if($error!=""){
        $error= '<div class="alert alert-danger" role="alert"><strong>There are error(s) in your form.</strong><br>'.$error.'</div>'; 
    }
    else
    {
        $emailTo="aayushsinghnaruka@gmail.com";
        $subject=$_POST['subject'];
        $content=$_POST['content'];
        $headers="From :".$_POST['email'];
       if(mail($emailTo,$subject,$content,$headers)){
            $success='<div class="alert alert-success" role="alert"><strong>Your message was sent successfully.</strong><br>'.$error.'</div>'; 
        }
        else {
        $error= '<div class="alert alert-danger" role="alert"><strong>Your message couldn\'t be sent.</strong><br>'.$error.'</div>'; 
            
        } 
    }
    
  }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Submit your response</title>
        <link rel="stylesheet" type="text/css" href="form.css">
        <script type="text/javascript" src="../jquery-2.2.0.js"></script>
    </head>
    <body>
    <div id="container">
        <div id="block">
            <h1>Get in touch!</h1>
            <div id="error"> <?php Print $error.$success; ?></div>
             <form method="post">
                    <fieldset>
                        <label class="one">Email address</label><br>
                        <input type="email" name="email" id="email" class="one" placeholder="Enter your email address"><br>
                        <small class="one" id="term"><span id="star">*</span>We will never share your email with anyone else.</small><br><br>
                        </fieldset>
                    <fieldset>
                        <label class="one" id="sub">Subject</label><br>
                        <input class="one" name="subject" type="text" id="subject"><br>
                    </fieldset>
                    <fieldset>
                        <label class="one">What would you like to ask us?</label><br>
                        <textarea class="one" name="content" id="content" row="5"></textarea><br>
                    </fieldset>
                    <button class="one" type="submit" id="button">Submit</button><br>
             </form>
        </div>
        </div>

        <script type="text/javascript">
                $("form").submit(function (e){
                    e.preventDefault();
                    var error = "";
                    if($("#email").val()==""){
                        error+="The email field is required.<br>";
                    }
                    if($("#subject").val()==""){
                        error+="The subject field is required.<br>";
                    }
                    if($("#content").val()==""){
                        error+="The content field is required.";
                    }
                    if(error!=""){
                    $("#error").html('<div class="alert alert-danger" role="alert"><strong>There are error(s) in your form.</strong><br>'+error+'</div>');}
                    else{
                        $("form").unbind('submit').submit()
                    }
                });    
        </script>
        
    </body>
</html>