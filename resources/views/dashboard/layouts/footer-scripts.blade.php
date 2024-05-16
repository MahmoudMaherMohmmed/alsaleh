<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('dashboard/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('dashboard/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('dashboard/assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('dashboard/assets/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{URL::asset('dashboard/assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('dashboard/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('dashboard/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- sidebar js -->
@if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    <script src="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
@else
    <script src="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar.js')}}"></script>
@endif
<script src="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('dashboard/assets/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('dashboard/assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('dashboard/assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('dashboard/assets/plugins/side-menu/sidemenu.js')}}"></script>

<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>
<script>
    MsgElem = document.getElementById("msg");
    NotificationsElement = document.getElementById("notification_fcm");
    ErrElem = document.getElementById("err");

    // Initialize Firebase
    firebase.initializeApp({
        apiKey: "AIzaSyD3sM3PeX73ZEK5F0z6cfuCBr04R8hP3Sg",
        authDomain: "engaz-a3646.firebaseapp.com",
        projectId: "engaz-a3646",
        storageBucket: "engaz-a3646.appspot.com",
        messagingSenderId: "430433133140",
        appId: "1:430433133140:web:3d46df7f164f32657283c1",
        measurementId: "G-LWJZGBXKY2"
    });
    const messaging = firebase.messaging();

    messaging.requestPermission()
    .then(function () {
        //  MsgElem.innerHTML = "Notification permission granted."
        console.log("Notification permission granted.");

        // get the token in the form of promise
        return messaging.getToken()
    })
    .then(function(token) {
        // TokenElem.innerHTML = "token is : " + token
    })
    .catch(function (err) {
        // ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
        console.log("Unable to get permission to notify.", err);
    });

    messaging.onMessage(function(payload) {
        console.log("Message received. ", payload);
        NotificationsElement.innerHTML = NotificationsElement.innerHTML + '<div class="alert alert-success " role="alert"> <strong>' + payload.notification.title +'</strong>  '+payload.notification.body+ '</div>'

        if(Notification.permission!=='default'){
            var notify;
            notify= new Notification("{{__('dashboard.eva_clinic')}} | " + payload.notification.title,{
                'body': payload.notification.body,
                'icon': "{{URL::asset('dashboard/assets/img/brand/logo.png')}}",
                'tag': payload.data.url
            });

            notify.onclick = function(){
                window.location.href = this.tag;
            }
        }else{
            alert('Please allow the notification first');
        }
    });
</script>
