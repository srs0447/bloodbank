<footer class="page-footer">
    <div class="row">
        <div class="col s12 m3">
            <h5 class="white-text">Contact Us</h5>
            <p class="grey-text text-lighten-4">
                E-Mail: savelives@savelives.com
            </p>
            <p class="grey-text text-lighten-4">Phone / Mobile: +91 6558456868</p>
        </div>
        <div class="col s12 m3">
            <h5 class="white-text">SAVELIVES.COM</h5>
            <p class="grey-text text-lighten-4">
                One man can save thousands of lives......
            </p>
            <p class="grey-text text-lighten-4">
                One man can save thousands of lives......
            </p>
            <p class="grey-text text-lighten-4">
                One man can save thousands of lives......
            </p>
            <p class="grey-text text-lighten-4">
                One man can save thousands of lives......
            </p>
        </div>
        <div class="col s12 m3 impLinks">
            <h5 class="white-text">Links</h5>
            <ul>
                <li>
                    <a href="#"><i class="material-icons" style="font-size: 2.5rem;">navigate_next</i>Donate</a>
                </li>
                
                <li>
                    <a href="#"><i class="material-icons" style="font-size: 2.5rem;">navigate_next</i>Contact
                    </a>
                </li>
                <li>
                    <a href="#"><i class="material-icons" style="font-size: 2.5rem;">navigate_next</i>About</a>
                </li>
                <li>
                    <a href="#"><i class="material-icons" style="font-size: 2.5rem;">navigate_next</i>Login</a>
                </li>
                <li>
                    <a href="#"><i class="material-icons" style="font-size: 2.5rem;">navigate_next</i>Register</a>
                </li>
            </ul>
        </div>
        <div class="col s12 m3 links">
            <h5 class="white-text">Social Links</h5>
            <ul>
                <li>
                    <a class="waves-effect waves-light btn social facebook">
                        <i class="fab fa-facebook-square left"></i> Facebook</a>
                </li>
                <li>
                    <a class="waves-effect waves-light btn social twitter">
                        <i class="fa fa-twitter left"></i> Twitter</a>
                </li>
                <li>
                    <a class="waves-effect waves-light btn social google">
                        <i class="fa fa-google left"></i> Google</a>
                </li>
                <li>
                    <a class="waves-effect waves-light btn social github">
                        <i class="fa fa-github left"></i> Github</a>
                </li>
                <li>
                    <a class="waves-effect waves-light btn social pinterest">
                        <i class="fa fa-pinterest left"></i> Pinterest</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2018 savelives.com
            <a class="grey-text text-lighten-4 right" href="#!">About Us</a>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


<script>
    $(document).ready(function () {
        $(".sidenav").sidenav();
    });
    $(".carousel").carousel({
        padding: 200
    });
    setTimeout(autoplay, 4500);
    function autoplay() {
        $(".carousel").carousel("next");
        setTimeout(autoplay, 4500);
    }

    $(".carousel.carousel-slider").carousel({
        fullWidth: true
    });
    $(document).ready(function () {
        $(".parallax").parallax();
    });
    $(document).ready(function () {
        $(".tooltipped").tooltip();
    });

    $(document).ready(function () {
        $("select").formSelect();
    });
     $(document).ready(function () {
            $('.collapsible').collapsible();
        });
    $(window).scroll(function(){
        if($(document).scrollTop() > 50){
            $('#nav').addClass('fixed-nav');
        }else{
            $('#nav').removeClass('fixed-nav');
        }
    });
   $(document).ready(function(){
      $('.modal').modal();
    });
    function show1(){
        if($( "#user_login" ).prop( "checked", true )){
          $("#user_logins").show();
          $("#bank_logins").hide();
        }
    }
    function show2(){
        if($( "#bank_login" ).prop( "checked", true )){
           $("#user_logins").hide();
          $("#bank_logins").show();
          
        }
    }
    
</script>
</body>

</html>