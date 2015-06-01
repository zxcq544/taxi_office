<!-- Button trigger modal -->
<button id="get_form_content" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	Заказать
</button>
<script>
	var order_form;
	var send_button;
	var get_form_content_button = document.getElementById('get_form_content');

	//Получение формы после нажатия на кнопку Заказать
	get_form_content_button.addEventListener('click', function () {
		jQuery.get("/ajax_order_page", function (data) {
			jQuery("#modal-body-id").html(data);
			jQuery("#edit-phone").mask("+7 (999) 999-9999");
			send_button = document.getElementById('edit-submit');
			order_form = document.getElementById('order-form');
			order_form.addEventListener('submit', function (ev) {
				ev.preventDefault();
				send_form_by_ajax();
			});
		});
	});


	//функция для отправки формы заказа по аякс
	function send_form_by_ajax() {
		var xhr = new XMLHttpRequest();
		xhr.onload = function (ev) {
			if (xhr.status == 200) {
				window.location = "/dispatcher";
			} else {
				alert("Error " + xhr.status + " occurred uploading your file.<br \/>");
			}
		};
		xhr.open('post', '/ajax_order_page');
		xhr.send(new FormData(order_form));
	}


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
<script>
	jQuery(function ($) {

	});
</script>