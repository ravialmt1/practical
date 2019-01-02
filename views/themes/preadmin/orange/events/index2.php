<div class="content container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-xs-6">
                        <h4 class="page-title">Calendar</h4>
                    </div>
                    <div class="col-sm-4 col-xs-6 text-right m-b-30">
                        <a href="#" class="btn btn-primary rounded" data-toggle="modal" data-target="#add_event"><i class="fa fa-plus"></i> Add Event</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box m-b-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal custom-modal fade none-border" id="event-modal">
                            <div class="modal-dialog">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <div class="modal-content modal-md">
                                     
                                    <div class="modal-body"></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php $this->registerJsFile("http://localhost/practical/views/themes/preadmin/orange/assets/js/jquery-3.2.1.min.js");
    $this->registerJsFile("http://localhost/practical/views/themes/preadmin/orange/assets/js/bootstrap.min.js");
     $this->registerJsFile("http://localhost/practical/views/themes/preadmin/orange/assets/js/jquery.slimscroll.js");
    $this->registerJsFile("http://localhost/practical/views/themes/preadmin/orange/assets/js/select2.min.js");
     $this->registerJsFile("http://localhost/practical/views/themes/preadmin/orange/assets/js/moment.min.js");
     $this->registerJsFile("http://localhost/practical/views/themes/preadmin/orange/assets/js/jquery-ui.min.js");
    $this->registerJsFile("http://localhost/practical/views/themes/preadmin/orange/assets/js/fullcalendar.min.js");
    $this->registerJsFile("http://localhost/practical/views/themes/preadmin/orange/assets/js/jquery.fullcalendar.js");
    $this->registerJsFile("http://localhost/practical/views/themes/preadmin/orange/assets/js/bootstrap-datetimepicker.min.js");
     $this->registerJsFile("http://localhost/practical/views/themes/preadmin/orange/assets/js/app.js");
	 ?>
			
