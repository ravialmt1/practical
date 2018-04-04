<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
 $().ready(function(){
        $('[rel="tooltip"]').tooltip();

    });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
	</script>
</head>
<?php
function print_card($class,$sect, $total_students) { ?>
</style>
<div class="col-md-4 col-sm-6">
             <div class="card-container manual-flip">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="images/rotating_card_thumb.png"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="images/rotating_card_profile2.png"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Andrew Mike</h3>
                                <p class="profession">Web Developer</p>
                                <p class="text-center">"Lamborghini Mercy <br>Your chick she so thirsty <br>I'm in that two seat Lambo"</p>
                            </div>
                            <div class="footer">
                                <button class="btn btn-simple" onclick="rotateCard(this)">
                                    <i class="fa fa-mail-forward"></i> Manual Rotation
                                </button>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Job Description</h4>
                                <p class="text-center">Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>235</h4>
                                        <p>
                                            Followers
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>114</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>35</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            <button class="btn btn-simple" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                <i class="fa fa-reply"></i> Back
                            </button>
                            <div class="social-links text-center">
                                <a href="http://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                <a href="http://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                <a href="http://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col sm 3 -->

<div class="col-md-4 col-sm-6">
 <div class="card-container manual-flip">
         <div class="card">
             <div class="front">
                 <div class="cover">
                     <img src="../images/rotating_card_thumb3.png"/>
                 </div>
                 
                 <div class="content">
                     <div class="main">
                         <h3 class="name"><?= $class ?></h3>
                         <h4 class="profession">Semester</h4>

                         <h4 class="text-center">"You are in <?= $class ?> Class & Section <?= $sect ?>.  "</h4>
						 
						  <div class="stats-container">
                             <div class="stats">
                                 <h4><i class="fa fa-university" aria-hidden="true"></i>: 201A   </h4>
                                 <p>
                                     |  <i class="fa fa-file-video-o" aria-hidden="true"></i>  | <i class="fa fa-signal" aria-hidden="true"></i> |
                                 </p>
                             </div>
                             <div class="stats">
                                 <h4><i class="fa fa-flask" aria-hidden="true"></i> : 2 </h4>
                                 <p>
                                  | <i class="fa fa-desktop" aria-hidden="true"></i> : 45  | <i class="fa fa-signal" aria-hidden="true"></i> |
                                 </p>
                             </div>
                             <div class="stats">
                                 <h4><i class="fa fa-signal" aria-hidden="true"></i> Speed: </h4>
                                 <p>
                                     | 100 Mbps |  
                                 </p>
                             </div>
							 </div>
                     </div>
					
							 
                     <div class="footer">
                         <div class="rating">
						   <button class="btn btn-simple" onclick="rotateCard(this)">
                             <i class="fa fa-mail-forward"></i> View More Information
                         </div>
                     </div>
                 </div>
             </div> <!-- end front panel -->
             <div class="back">
                 <div class="header">
                     <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                 </div>
                 <div class="content">
                     <div class="main">
                         <h4 class="text-center">Total Students : <?= $total_students ?></h4>
						 <h4 class="text-center">Fees : </h4>
                         

 <div class="stats-container">                       
                             <div class="stats">
                                 <h4><?= $total_students ?></h4>
                                 <p>
                                     Paid Full Fees
                                 </p>
                             </div>
                             <div class="stats">
                                 <h4><?= $total_students ?></h4>
                                 <p>
                                     have to pay Fees
                                 </p>
                             </div>
                            
							 
							
							 </div>
							 
                     </div>
                 </div>
                 <div class="footer">
                     <div class="social-links text-center">
                         <a href="http://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                         <a href="http://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                         <a href="http://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                     </div>
                 </div>
				 
             </div> <!-- end back panel -->
         </div> <!-- end card -->
     </div> <!-- end card-container -->
	 </div><!-- end col-md-4 -->
	 </div>
	 <?php
}
	 ?>
