<!-- /.row -->
 <section class="content">
      <div class="row">
           <div class="col-md-12">
           <?php if ($this->session->flashdata('msg' )): ?>
          <div class="alert alert-success">
          <?php echo $this->session->flashdata('msg'); ?>  
          </div>
           <?php endif; ?> 
        <div class="col-xs-12">
          <div class="box col-sm-12">
            <div class="box-header" >
              <h3 class="box-title">Update Expense</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <form class="form-horizontal" id="expense" action="<?php echo base_url()?>Definition/update_expense" method="post">
          
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <input type="date" name="date" class="form-control" id="inputEmail3" placeholder="Date" required>
                        </div>
                      </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Coordinates">Title <span class="required">*</span>
                        </label>

                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <input  name="title" class="form-control" type="text" placeholder="Search Box">
                        </div>

                        </div>
                    
                  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Amount<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="amount" name="amount" type="text" class="form-control" >                        
                          </div>
                      </div>
                     
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Payee<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="time_out" name="payee" type="text" class="form-control" >                        
                          </div>
                      </div>
   
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="address" name="remarks" class="form-control"  placeholder="remarks" >
                        </div>
                      </div>
                     <input type="submit" name="myform" value="Add" class="col-md-offset-3 btn btn-primary">   
               
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

 
<script type="text/javascript">

function ValidateNumberOnly()
{
if ((event.keyCode < 48 || event.keyCode > 57)) 
{
   event.returnValue = false;
}
}

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#expense')
            .on('init.form.bv', function(e, data) {
                //console.log(data);
            })
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    date: {
                        trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The date field is required'
                            }
                        }
                    },
                   
                    excluded: ':disabled', 
                    title: {
                         trigger:'blur change keyup focus',
                        validators: {
                            notEmpty: {
                                message: 'The title field is required'
                            }
                        }
                    },
                    
                    amount: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The amount field is required'
                            }
                        }
                    },
                      payee: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The payee field is required'
                            }
                        }
                    },

                   
                }

            });

    });
    

$("#zzz").click(function(){
   $('#shippingForm').bootstrapValidator("resetForm",true);    
});

</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBbDBcMA-rjt7I6ZryDcry9M72L7UlDERc&libraries=places"></script>

<script>
 var map;
 function init() {
   map = new google.maps.Map(document.getElementById('map-canvas'), {
     center: {
       lat: 31.468789208106767,
       lng: 74.3184757232666
     },
     zoom: 17
   });


   var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
   map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
   google.maps.event.addListener(searchBox, 'places_changed', function() {
     searchBox.set('map', null);


     var places = searchBox.getPlaces();

     var bounds = new google.maps.LatLngBounds();
     var i, place;
     for (i = 0; place = places[i]; i++) {
       (function(place) {
         var marker = new google.maps.Marker({

           position: place.geometry.location
         });
         marker.bindTo('map', searchBox, 'map');
         google.maps.event.addListener(marker, 'map_changed', function() {
           if (!this.getMap()) {
             this.unbindAll();
           }
         });
         bounds.extend(place.geometry.location);


       }(place));

     }
     map.fitBounds(bounds);
     searchBox.set('map', map);
     map.setZoom(Math.min(map.getZoom(),12));

   });
   google.maps.event.addListener(map, 'click', function (e) {
               // alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                
         //var long = e.latLng.lat();
        // var lat  = e.latLng.lng();
         
         var info = e.latLng.lat() + "," + e.latLng.lng()
         //alert(info);
         
         $('#cord').val(info );
         
                
});
 }
 google.maps.event.addDomListener(window, 'load', init);

</script>

<script>
$('#time_in').timepicker({
    timeFormat: 'h:mm p',
    interval: 30,
    minTime: '9',
    maxTime: '6:00pm',
    defaultTime: '9',
    startTime: '9:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

$('#time_out').timepicker({
    timeFormat: 'h:mm p',
    interval: 30,
    minTime: '6',
    maxTime: '6:00pm',
    defaultTime: '6pm',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

</script>