<script src="{{URL::to('/public/assets/')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{URL::to('/public/assets/')}}/plugins/bootstrap/js/popper.min.js"></script>

<script src="{{URL::to('/public/assets/')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{URL::to('/public/assets/')}}/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="{{URL::to('/public/assets/')}}/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{URL::to('/public/assets/')}}/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="{{URL::to('/public/assets/')}}/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="{{URL::to('/public/assets/')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="{{URL::to('/public/assets/')}}/js/custom.min.js"></script>
<script src="{{URL::to('/public/assets/')}}/js/dev.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session()->has('success'))
	<script type="text/javascript">
		$(document).ready(function(){
			swal("Success!", "{{ session()->get('success') }}", "success");
		});
	</script>
@endif
@if(session()->has('error'))
	<script type="text/javascript">
		$(document).ready(function(){
			swal("Alert!", "{{ session()->get('error') }}", "warning");
		});
	</script>
@endif

<script>
	$(document).ready(function(){

  $(document).on('click', '.viewRemarks1', function(){
    var id = $(this).data('id');
    $('#leadDetailModal').modal('hide');
    $.get("{{URL::to('/')}}/agent1/leads/viewRemarks/"+id, function(data){

      $('#leadRemarksModalBody').html(data);
      $('#leadRemarksModal').modal('show');
    });
  });
});
</script>