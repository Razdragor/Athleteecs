@extends('layouts.login')

@section('content')
    <div class="login">
        <div class="row login_details">
          <div class="col-md-6">
              <div class="join">
                 <h3>Why Join ?</h3>
                 <h4>sed diam nonummy nibh euismod</h4>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam<br> nibh euismod tincidunt ut laoreet dolore magna . </p>
                 <div class="btn3">
                   <a href="#">Join Today</a>
                 </div>
              </div>
            </div>
             <div class="col-md-6">
              <div class="join-right">
                 <h3>Why Join ?</h3>
                 <h4>sed diam nonummy nibh euismod</h4>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam<br> nibh euismod tincidunt ut laoreet dolore magna . </p>
                 <div class="buttons_login">
                 <div class="btn4">
                   <a href="login.html">Log In</a>
                 </div>
                 <div class="p-ww">
                  <form>
                   <input class="date" id="datepicker" type="text" value="View Calender" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'View Calender';}">
                  </form>
                 </div>
                 <div class="clear"></div>
                 <!---strat-date-piker---->
              <script src="js/jquery-ui.js"></script>
              <script>
              $(function() {
                $( "#datepicker" ).datepicker();
              });
              </script>
              </div>
              </div>
            </div>
            <div class="clear"></div>
       </div>
    </div>
@endsection
