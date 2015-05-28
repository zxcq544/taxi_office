var socket = io(nodeJsUrl);
io.on('hello', function (data) {
	console.log(data);
});