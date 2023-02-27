<footer id="footer">
    <div class="container-fluid">
        <div class="row top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                        <a href="{{url('/')}}"><img src="{{asset('public/img/acota-logo-footer.png')}}"></a>
                    </div>
                    <div class="col-lg-8">
                        <ul>
                            <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <ul class="socials">
<!--                            <li><a href="#" class="mr-2 fab fa-facebook-f"></a> </li>-->
<!--                            <li><a href="#" class="mr-2 fab fa-twitter"></a> </li>-->
                            <li><a href="https://www.linkedin.com/company/acotaconsulting/" target="_blank" class="mr-2 fab fa-linkedin"></a> </li>
<!--                            <li><a href="#" class="fab fa-instagram"></a> </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        © 2020 ACOTA. All right reserved.
                    </div>
                    <div class="col-lg-6">
                        <ul class="">
                            <li><a href="{{url('terms-and-conditions')}}" class="mr-1">Terms and conditions</a> </li>
                            <li><span class="mr-1 d-inline-block"> / </span></li>
                            <li><a href="{{url('privacy-policy')}}">Privacy policy</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('public/js/vendor/modernizr-3.11.2.min.js') }}"></script>
<script src="{{ asset('public/js/vendor/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('public/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/js/plugins.js') }}"></script>
<script src="{{ asset('public/js/main.js') }}"></script>

@yield('js')
</body>

</html>
