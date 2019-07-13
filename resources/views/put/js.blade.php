    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/moment.min.js') }}"></script>
	
    <script type="text/javascript" src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function () {
                $('#showDashboard').load(location.href + ' #showDashboard' )
            }, 60000);
        });
    </script>

  