var socket = io(nodeJsUrl);

console.log(nodeJsUrl);
socket.on('hello', function (data) {
	console.log(data);
});
socket.on('call',function(data){
	var block = notifyBlock(data);
	jQuery('body').append(block)
});

var notifyBlock = function(data){
	//return "<div class='notify-block'><h1>"+data.call+" Номер телефона"+data.number+"</h1></div>"
	var el = jQuery("<div/>",{
		"class":'alert alert-info',
		text: data.call + " Номер телефона " + data.number
	}).appendTo('body');
	//el.css({
	//	'position':'absolute',
	//
	//			 });

}
