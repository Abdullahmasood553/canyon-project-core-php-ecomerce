    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
        
        function load_unseen_notification(view = '')
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{view:view},
                dataType:"json",
                success:function(data)
                {
                $('.notification-dropdown').html(data.notification);
                if(data.unseen_notification > 0){
                $('.count').html(data.unseen_notification);
                }
                }
            });
        }
    
        load_unseen_notification();
    
        /*$('#add_form').on('submit', function(event){
            event.preventDefault();
            if($('#admin_msg').val() != '' && $('#user_id').val() != '' && $('#order_id').val() != ''){
            var form_data = $(this).serialize();
            alert(form_data);
            $.ajax({
                url:"addnew.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                $('#add_form')[0].reset();
                load_unseen_notification();
                }
            });
            }
            else{
                alert("Enter Data First");
            }
        });*/
    
        $(document).on('click', '.dropdown-toggle', function(){
        $('.count').html('');
        load_unseen_notification('yes');
        });
    
        setInterval(function(){ 
            load_unseen_notification();
        }, 5000);
    });
    </script>