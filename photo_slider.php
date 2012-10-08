<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>s3Slider jQuery plugin</title>
<!-- CSS -->
<style type="text/css" media="screen">
#slider1 {
    width: 960px; /* important to be same as image width */
    height: 300px; /* important to be same as image height */
    position: relative; /* important */
	overflow: hidden; /* important */
	margin-top: 0px;
	margin-left: 0px;
}

#slider1Content {
    width: 960px; /* important to be same as image width or wider */
    position: absolute;
	top: 0;
	margin-top: 0px;
	margin-left: 0px;

}
.slider1Image {
    float: left;
    position: relative;
	display: none;
	margin-left: 0px;
}
.slider1Image span {
    position: absolute;
	font: 15px/20px Georgia, Georgia, sans-serif;
    width: 960px;
    background-color: #000;
    filter: alpha(opacity=70);
    -moz-opacity: 0.7;
	-khtml-opacity: 0.7;
    opacity: 0.7;
    color: #fff;
    display: none;
}
.clear {
	clear: both;
}
.slider1Image span strong {
    font-size: 14px;
}
.left {
	top: 0;
   left: 0;
	width: 200px !important;
	height: 300px;
	padding-top: 15px;
	padding-left: 15px;
	padding-right: 15px;
	font: normal 15px Georgia;
	visibility: hidden;
}
.right {
	right: 0;
	bottom: 0;
	width: 90px !important;
	height: 290px;
	visibility: hidden;
}

a {
	text-decoration: underline;
	color: white;
}
ul { list-style-type: none;
padding-left: 0px;
margin-left: 0px;}
</style>
<!-- JavaScripts-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/s3Slider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#slider1').s3Slider({
            timeOut: 5000 
        });
    });
</script>
</head>

<body>

    <div id="slider1">
        <ul id="slider1Content">
        
            <li class="slider1Image">
                <a href=""><img src="img/photo_slider/3.jpg" alt="0" /></a>
                <span class="left"><strong>Find your way to the spirit of democracy</strong><br />Bratislava Model United Nations conference, an exact academic simulation of the United </span></li>
                
                        
           <li class="slider1Image">
                <a href=""><img src="img/photo_slider/2.jpg" alt="0" /></a>
                <span class="left"><strong>Explore the wonders of Bratislava</strong><br />Debate the current world issues in the historical metropolis of Slovakia. The venue of the conference in next to the city's main landmark - the Bratislava castle. <a href="gallery.php" target="_blank">Learn more... </a></span></li>
           
           <li class="slider1Image">
                <a href="page.php?id=video" target="_parent"><img src="img/photo_slider/4.jpg" alt="0" /></a>
                <span class="left"><strong>Find your way to the spirit of democracy</strong><br />Bratislava Model United Nations conference, an exact academic simulation of the United </span></li>
    
                
            <div class="clear slider1Image"></div>
        </ul>
        
        
    </div>
  <!-- // slider -->

</body>
</html>
