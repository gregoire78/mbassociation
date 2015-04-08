<?php session_start(); ?>
<!DOCTYPE html>
<html>
     <head>
         <!-- jQuery -->
         <script src="js/jquery-2.1.3.min.js"></script>
         <meta name="language" content="fr-FR" >
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <link rel="icon" href="design/favicon.png">
         <meta charset="UTF-8">

         <!-- Latest compiled and minified CSS -->
         <link rel="stylesheet" href="bootstrap-3.3.1/dist/css/bootstrap.min.css">
         <!-- Optional theme -->
         <link rel="stylesheet" href="bootstrap-3.3.1/dist/css/bootstrap-theme.min.css">

         <!--js Files-->
         <!-- Latest compiled and minified JavaScript -->
         <script src="bootstrap-3.3.1/dist/js/bootstrap.min.js"></script>
         <!--pour le scroll-->
         <script src="js/jquery.nicescroll.min.js"></script>
         <script>
             $(document).ready(function() {
                 var nicesx = $("html").niceScroll({touchbehavior:false,cursorcolor:"#e8e8e8",cursoropacitymax:0.6,cursorwidth:15,zindex:2,cursorborderradius:25});
             });
         </script>
         <!--pour les win phone et bootstrap-->
         <script>
             if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
                 var msViewportStyle = document.createElement('style')
                 msViewportStyle.appendChild(
                     document.createTextNode(
                         '@-ms-viewport{width:auto!important}'
                     )
                 )
                 document.querySelector('head').appendChild(msViewportStyle)
             }
         </script>
         <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
         <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
         <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
         <![endif]-->
         <link href="design/asso.css" rel="stylesheet" type="text/css" />
         <meta charset="UTF-8" />
         <title>Association</title>
         <link href="design/actualite.css" rel="stylesheet" type="text/css" />
		 <div id="calendrier">
		 <style type="text/css">
             <!--
             span.label {color:#A0A0A0;width:60;height:30;text-align:center;margin-top:0;background:transparent;font:bold 20px Arial}
             span.c1 {cursor:hand;color:#00C8FF;width:60;height:30;text-align:center;margin-top:0;background:transparent;font:bold 20px Arial}
             span.c2 {cursor:hand;color:#00FF00;width:60;height:30;text-align:center;margin-top:0;background:transparent;font:bold 20px Arial}
             span.c3 {cursor:hand;color:#b0b0b0;width:60;height:30;text-align:center;margin-top:0;background:transparent;font:bold 20px Arial}
             -->
         </style>
		 <script type="text/javascript">
         function maxDays(mm, yyyy){
             var mDay;
             if((mm == 3) || (mm == 5) || (mm == 8) || (mm == 10)){
 	             mDay = 30;
             }
             else{
   	             mDay = 31
   	             if(mm == 1){
     	             if (yyyy/4 - parseInt(yyyy/4) != 0){
                         mDay = 28
     	             }
     	             else{
                     mDay = 29
                     }
 	             }
             }
             return mDay;
         }
         function writeCalendar(){
             var now = new Date
             var dd = now.getDate()
             var mm = now.getMonth()
             var dow = now.getDay()
             var yyyy = now.getFullYear()
             var arrM = new Array("Janvier","Fevrier","Mars","Avril","Mai","Juin","Jeuillet","Aout","Septembre","Octobre","Novembre","Decembre" )
             var arrY = new Array()
             for (ii=0;ii<=4;ii++){
 	             arrY[ii] = yyyy - 2 + ii
             }
             var arrD = new Array("Dim","Lun","Mar","Mer","Jeu","Ven","Sam" )
             var text = ""
             text = "<form name=calForm>"
             text += "<table border=1>"
             text += "<tr><td>"
             text += "<table width=100%><tr>"
             text += "<td align=left>"
             text += "<select name=selMonth onChange='changeCal()'>"
             for (ii=0;ii<=11;ii++){
 	             if (ii==mm){
                     text += "<option value= " + ii + " Selected>" + arrM[ii] + "</option>"
 	             }
 	             else{
                     text += "<option value= " + ii + ">" + arrM[ii] + "</option>"
 	             }
             }
             text += "</select>"
             text += "</td>"
             text += "<td align=right>"
             text += "<select name=selYear onChange='changeCal()'>"
             for (ii=0;ii<=4;ii++){
 	             if (ii==2){
                     text += "<option value= " + arrY[ii] + " Selected>" + arrY[ii] + "</option>"
 	             }
 	             else{
                     text += "<option value= " + arrY[ii] + ">" + arrY[ii] + "</option>"
 	             }
             }
             text += "</select>"
             text += "</td>"
             text += "</tr></table>"
             text += "</td></tr>"
             text += "<tr><td>"
             text += "<table border=1>"
             text += "<tr>"
             for (ii=0;ii<=6;ii++){
 	             text += "<td align=center><span class=label>" + arrD[ii] + "</span></td>"
             }
             text += "</tr>"
             aa = 0
             for (kk=0;kk<=5;kk++){
 	             text += "<tr>"
 	             for (ii=0;ii<=6;ii++){
                     text += "<td align=center><span id=sp" + aa + " onClick='changeBg(this.id)'>1</span></td>"
                     aa += 1
 	             }
 	             text += "</tr>"
             }
             text += "</table>"
             text += "</td></tr>"
             text += "</table>"
             text += "</form>"
             document.write(text)
             changeCal()
         }
             function changeCal(){
                 var now = new Date
                 var dd = now.getDate()
                 var mm = now.getMonth()
                 var dow = now.getDay()
                 var yyyy = now.getFullYear()
                 var currM = parseInt(document.calForm.selMonth.value)
                 var prevM
                 if (currM!=0){
 	                 prevM = currM - 1
                 }
                 else{
 	                 prevM = 11
                 }
                 var currY = parseInt(document.calForm.selYear.value)
                 var mmyyyy = new Date()
                 mmyyyy.setFullYear(currY)
                 mmyyyy.setMonth(currM)
                 mmyyyy.setDate(1)
                 var day1 = mmyyyy.getDay()
                 if (day1 == 0){
 	                 day1 = 7
                 }
                 var arrN = new Array(41)
                 var aa
                 for (ii=0;ii<day1;ii++){
 	                 arrN[ii] = maxDays((prevM),currY) - day1 + ii + 1
                 }
                 aa = 1
                 for (ii=day1;ii<=day1+maxDays(currM,currY)-1;ii++){
 	                 arrN[ii] = aa
 	                 aa += 1
                 }
                 aa = 1
                 for (ii=day1+maxDays(currM,currY);ii<=41;ii++){
 	                 arrN[ii] = aa
 	                 aa += 1
                 }
                 for (ii=0;ii<=41;ii++){
 	                 eval("sp"+ii).style.backgroundColor = "transparent"
                 }
                 var dCount = 0
                 for (ii=0;ii<=41;ii++){
 	                 if (((ii<7)&&(arrN[ii]>20))||((ii>27)&&(arrN[ii]<20))){
                         eval("sp"+ii).innerHTML = arrN[ii]
                         eval("sp"+ii).className = "c3"
 	                 }
 	                 else{
                         eval("sp"+ii).innerHTML = arrN[ii]
                         if ((dCount==0)||(dCount==6)){
   	                         eval("sp"+ii).className = "c2"
                         }
                         else{
   	                         eval("sp"+ii).className = "c1"
                         }
                         if ((arrN[ii]==dd)&&(mm==currM)&&(yyyy==currY)){
   	                         eval("sp"+ii).style.color="#FF6600";
                         }
 	                 }
                     dCount += 1
 	                 if (dCount>6){
                         dCount=0
 	                 }
                 }
             }
         </script>
         <script type="text/javascript"> writeCalendar() </script>
         </div>
	 </head>
	 <body>
     <?php

     include('php/connect_bdd.php');
     include_once('php/change_menu.php');
     ?>
		     <?php
             $bdd = mysqli_connect("localhost", "root", "root", "mbassociation");
			 if(isset($_POST["enregistrer"]))
             {
				 $message = $_POST["textarea"];
				 if (empty($message))
                 {
				     echo "remplis la zone de texte";
                 }
                 else
                 {
					 $query = mysqli_query($connect, "update actualite set message=$message");
				 }
                    echo $id=$_SESSION["id_user"];
  				 if ($id >= 0)
                 {
				     ?>
				     <form method="post">
				     <textarea rows="20" cols="110" name="textarea">
					 <?php
					 $req_utilisateur = mysqli_query($bdd,"SELECT message from actualite");
					 while($tab = mysqli_fetch_array($req_utilisateur))
                     {
				         echo $tab["message"];
                     }
					 ?>
					 </textarea>
                     <input type="submit" value="enregistrer" name="enregistrer">
                     </form>
                     <?php					 
				 }
                 else
                 {
					     ?>
					     <p>
					     <?php
					     $req_utilisateur = mysqli_query($bdd,"SELECT message from actualite");
					     while($tab = mysqli_fetch_array($req_utilisateur))
                         {
				             echo $tab["message"];
				         } 
					 ?>
					 </p>
					 <?php
                 }
             }
			 ?>
	 </body>
</html>