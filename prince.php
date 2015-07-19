<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
      
    <title>The Prince - CharactersNJ</title><!-- CHANGE TO CHARACTER -->

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	
	<!-- Skin CSS file (styling of UI - buttons, caption, etc.)
     In the folder of skin CSS file there are also:
     - .png and .svg icons sprite, 
     - preloader.gif (for browsers that do not support CSS animations) -->
	<link rel="stylesheet" href="css/default-skin/default-skin.css"> 
	
	<!--Custom Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	  
  	<link rel="stylesheet" href="js/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

	  
<!-- PHP for the contact form -->	  
<?php 
    //set validation error flag as false
    $error = false;
    //check if form is submitted
    if (isset($_POST['submit']))
    {
        $name = trim($_POST['txt_name']);
        $fromemail = trim($_POST['txt_email']);
		$date = trim($_POST['startDate']);
        $fromaddress = trim($_POST['txt_address']);
        $message = trim($_POST['txt_msg']);

        //name can contain only alpha characters and space
        if (!preg_match("/^[a-zA-Z ]+$/",$name))
        {
            $error = true;
            $name_error = "Please Enter Valid Name";
        }
        if(!filter_var($fromemail,FILTER_VALIDATE_EMAIL))
        {
            $error = true;
            $fromemail_error = "Please Enter Valid Email";
        }
        
        if(empty($fromaddress))
        {
            $error = true;
            $fromaddress_error = "Please Enter a Valid Address";
        }
        if (!$error)
        {
            //send mail
            $toemail = "edward2145@hotmail.com";
            $subject = "THE PRINCE Booking from " . $name; //CHANGE TO CHARACTER
            $body = "Here are the details of the booking: \n\n Name: $name \n From: $fromemail \n Date of Event: $date \n Message: \n $message";
            $headers = "From: $fromemail\n";
            $headers .= "Reply-To: $fromemail";

            if (mail ($toemail, $subject, $body, $headers))
                $alertmsg  = '<div class="alert alert-success text-center">Booking has been sent successfully! We will get back to you real soon.</div>';
            else
                $alertmsg = '<div class="alert alert-danger text-center">There was an error sending your booking.  Please try again later.</div>';
        }
    }
?>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="Characters NJ"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
		<li><a href="gallery.html">Gallery</a></li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Booking<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="characters.html">Characters</a></li>
			<li class="divider"></li>
            <li><a href="birthdays.html">Kids Birthdays</a></li>
			<li><a href="events.html">Special Events</a></li>
          </ul>
        </li>
		<li><a href="faq.html">FAQs</a></li>
		<li><a href="locations.html">Locations</a></li>
		<li><a href="contact.php">Contact</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="jumbotron faq-bg">
  <div class="container">
		<h1>The Prince</h1>
		
  </div>
</div>

<div class="container">
	<div class="row">
		
		<div class="col-sm-5">
			<ol class="breadcrumb">
				<li><a href="characters.html">&#10094;&#10094; Characters</a></li>
				<li class="active">The Prince</li>
			</ol>
			<h2 class="text-center">The Prince</h2>
			<img src="img/the-prince.jpg"5 alt="The Prince" class="img-responsive">
		</div>
		
		<div class="col-sm-7 booking-form">
            <p>Book the <strong>The Prince</strong> today for your next party! Once your booking is submitted, one of our <a href="index.html">CharactersNJ</a> representatives will contact you with more information on payment as well as planning ahead for your event.</p>
			<form role="form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="contactform">
            <fieldset>
                

                <div class="form-group">
                    <div class="col-md-12">
                        <?php if (isset($alertmsg)) { echo $alertmsg; } ?>
                        <label for="txt_name" class="control-label">Name</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="txt_name" placeholder="Your Full Name" type="text" value="<?php if($error) echo $name; ?>" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>
                </div><!-- NAME -->

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_email" class="control-label">Email</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="txt_email" placeholder="Your Email" type="text" value="<?php if($error) echo $fromemail; ?>" />
                        <span class="text-danger"><?php if (isset($fromemail_error)) echo $fromemail_error; ?></span> 
                    </div>
                </div><!-- EMAIL -->
                
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_address" class="control-label">Address</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="txt_address" placeholder="Your Address" type="text" value="<?php if($error) echo $fromaddress; ?>" />
                        <span class="text-danger"><?php if (isset($fromaddress_error)) echo $fromaddress_error; ?></span> 
                    </div>
                </div><!-- ADDRESS -->

                <div class='col-md-6'>
            		<div class="form-group">
						<label for="txt_date" class="control-label">Date &amp; Time</label>
						<div class='input-group date' id='startDate'>
							<input type='text' class="form-control" name="startDate" placeholder="Date of event"/>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div><!-- DATE -->

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_msg" class="control-label">Message</label>
                    </div>
                    <div class="col-md-12">
                        <textarea class="form-control" name="txt_msg" rows="4" placeholder="Your Message"><?php if($error) echo $message; ?></textarea>
                        <span class="text-danger"><?php if (isset($message_error)) echo $message_error; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input name="submit" type="submit" class="btn btn-lg btn-success" value="Submit booking" />
                    </div>
                </div>
            </fieldset>
            </form>
		</div>
	</div><!-- /.row -->
	
	
	
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 CharactersNJ &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

</div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="js/moment/moment.js"></script>
	<script type="text/javascript" src="js/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	  
	
	
<script>
    jQuery(document).ready(function($) 
    {
        $('#faq-list h3').on('click', function() 
        {                
            var $self = $(this);
			$self.toggleClass('close');
            $self.next('.answer').slideToggle(500);
            $self.toggleClass('close');

        });
    });
	
	$("#faqs dd").hide();
    $("#faqs dt").click(function () {
        $(this).next("#faqs dd").slideToggle(500);
        $(this).toggleClass("expanded");
    });
	
	jQuery(function () {
	jQuery('#startDate').datetimepicker();
	jQuery('#endDate').datetimepicker();
	jQuery("#startDate").on("dp.change",function (e) {
        jQuery('#endDate').data("DateTimePicker").setMinDate(e.date);
	});
	jQuery("#endDate").on("dp.change",function (e) {
        jQuery('#startDate').data("DateTimePicker").setMaxDate(e.date);
	});
});
</script>
  </body>
</html>