<!DOCTYPE html>
<html lang="en"><head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RDO</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url(); ?>css/mdb.min.css" rel="stylesheet">




	
<style type="text/css">
/*rdo button label */
.rdo_label{
	
	-webkit-box-shadow: -1px 7px 27px -8px rgba(0,0,0,0.75);
-moz-box-shadow: -1px 7px 27px -8px rgba(0,0,0,0.75);
box-shadow: -1px 7px 27px -8px rgba(0,0,0,0.75);
	border-radius:100%;
	padding:4px 6px 4px 6px;
	color:#fff;
	background-color:#cc0000;
	font-size:70%;
	
	
	
	}
.rdo_label_info{
	
	-webkit-box-shadow: -1px 7px 27px -8px rgba(0,0,0,0.75);
-moz-box-shadow: -1px 7px 27px -8px rgba(0,0,0,0.75);
box-shadow: -1px 7px 27px -8px rgba(0,0,0,0.75);
	border-radius:100%;
	padding:4px 8px 4px 8px;
	color:#cc0000;
	background-color:#ffd700;
	font-size:100%;
	font-weight:bold;
	margin-bottom:5px;
	margin-left:5px;
	
	
	
	}
/*rdo button*/
.btn-primary:focus, .btn-primary:hover{
	background-color:#666 !important;
	}
.btn-rdo{
	background:#666 !important;
	
	}
.btn-rdo:hover{
	background:#333 !important;
	
	}
/*rdo form checker*/

/*rdo sidebar*/
.rdo_nav{
	
	position:fixed; 
	border-right: 2px solid red; 
	padding-right:2%; 
	padding-bottom:10%;
	max-width:250px;
	}
@media only screen and (max-width: 768px) {
    .rdo_nav{
	
	position:static; 
	border-right: 0px solid red; 
	padding-right:0%; 
	padding-bottom:10%;
	margin:auto;
	
	}
}
.rdo-drop{

	width:100% !important;
	overflow-y:auto;
	max-height:300px;
}
.rdo-drop-item{

	white-space: normal !important;
	border-bottom: solid thin rgba(0,0,0,0.1);
	font-size: 80%;
}

/*rdo_tab*/
#rdo_tab{
	
	background-color:#cc0000; 
	position:fixed; 
	width:70%;
	
	}
@media only screen and (max-width: 768px) {
    #rdo_tab{
	
	background-color:#cc0000; 
	position:static; 
	width:90%;
	
	}
}
/*modal backdrop*/
.modal-backdrop.fade {
opacity: 0;
filter: alpha(opacity=0);
}
.modal-backdrop.in {
opacity: 0;
filter: alpha(opacity=0);
}
.modal-content{
	
-webkit-box-shadow: 0px 3px 39px -6px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 3px 39px -6px rgba(0,0,0,0.75);
box-shadow: 0px 3px 39px -6px rgba(0,0,0,0.75);
	
	}
/*thumbnail*/
.rdo_thumb{
	cursor:pointer;
	-webkit-box-shadow: 0px 3px 10px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 3px 10px 0px rgba(0,0,0,0.75);
	box-shadow: 0px 3px 10px 0px rgba(0,0,0,0.75);
	display: block;
    width: 100%;
    height: 250px;
	margin-top:10px;
	}
.container-rdo {
  position: relative;
  width: 100%;
  height:250px;
}
.rdo-panels{
	margin-top:20px;
	color:#cc0000;
	cursor:pointer;
	}
.overlay-rdo {
	
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 250px;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #cc0000;
}

.container-rdo:hover .overlay-rdo {
  opacity: 1;
}

.text-rdo {
  color: white;
  font-size: 90%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
/* scrollbar */
::-webkit-scrollbar {
  width: 6px;
  height: 6px;
}
::-webkit-scrollbar-button {
  width: 0px;
  height: 0px;
}
::-webkit-scrollbar-thumb {
  background: #cc0000;
  border: 0px none #ffffff;
  /*border-radius: 50px;*/
}
::-webkit-scrollbar-thumb:hover {
  background: #cc0000;
}
::-webkit-scrollbar-thumb:active {
  background: #cc0000;
}
::-webkit-scrollbar-track {
  background: #80ffff;
  border: 0px none #ffffff;
  border-radius: 0px;
}
::-webkit-scrollbar-track:hover {
  background: #80ffff;
}
::-webkit-scrollbar-track:active {
  background: #80ffff;
}
::-webkit-scrollbar-corner {
  background: transparent;
}
/* scrollbar */

html,
body,
header,
.view {
    height: 100%;
}
.hm-black-strong .full-bg-img, .hm-black-strong .mask{
	
	background-color:#fff !important;
	
	}
/* Navigation*/

.navbar {
    background-color: transparent;
}

.top-nav-collapse {
    background-color:rgba(128,128,128,1);
}

@media only screen and (max-width: 768px) {
    .navbar {
        background-color:rgba(128,128,128,1);
    }
}
/*Intro*/

.view {
   
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
	overflow: hidden;
	background-size: 107% 107%;
	background-repeat: no-repeat;
	background-attachment: fixed;
}

@media (max-width: 768px) {
    .full-bg-img,
    .view {
        height: auto;
        position: relative;
    }
}

.description {
    padding-top: 5%;
    padding-bottom: 3rem;
    color: #fff
}

@media (max-width: 992px) {
    .description {
        padding-top: 7rem;
        text-align: center;
    }
}
/*Arrow*/
.arrow-bounce {
  position:absolute;
  left:50%;
  bottom:0;
  margin-top:-25px;
  margin-left:-25px;
  height:50px;
  width:50px;
  color:#fff;
  -webkit-animation:bounce 1s infinite;
  font-size:25px;
  bottom:5%;
}

@-webkit-keyframes arrow-bounce {
  0%       { bottom:5px; }
  25%, 75% { bottom:15px; }
  50%      { bottom:20px; }
  100%     {bottom:0;}
}
    </style>
<style type="text/css">

#obj_pdf{
    height : 500px;
    width : 300px;
    overflow : hidden;
}
.parallax{
	background:url(img/pexels-photo.jpg);no-repeat center center fixed;
	 background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
	z-index:1;
	height:30%;
	transform: translateZ(1px) scale(1);
	perspective: 1px;
	}
.cleanbutton{
	background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
	padding:0px;
	padding-bottom:0px !important;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	margin:0px;
	}
.video-fluid{
	-webkit-box-shadow: 0px 2px 24px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 2px 24px 0px rgba(0,0,0,0.75);
	box-shadow: 0px 2px 24px 0px rgba(0,0,0,0.75);
	}
.rdo_button{
	
	background-color:transparent;
	
	color:#cc0000 !important;
	
	
	}
.rdo_button:hover{
	
	background-color:transparent;
	color:#666 !important;
	
	}
.rdo_button a{
	
	
	color:#cc0000;
	
	}
.rdo_nav li{
	margin-top:20px;
}

</style>
</head>

<body>



        