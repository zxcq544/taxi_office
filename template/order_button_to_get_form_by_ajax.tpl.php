<!-- Button trigger modal -->
<button id="get_form_content" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	Launch demo modal
</button>
<script>
	var get_form_content_button = document.getElementById('get_form_content');
	get_form_content_button.addEventListener('click', function () {
		jQuery.get("/ajax_order_page", function (data) {
			jQuery("#modal-body-id").html(data);
		});
	});
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Добавить Заказ</h4>
			</div>
			<div class="modal-body" id="modal-body-id">

			</div>
			<div class="modal-footer">
				<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>-->
			</div>
		</div>
	</div>
</div>