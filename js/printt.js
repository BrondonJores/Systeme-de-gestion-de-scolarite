var div = document.getElementById('');
var css = '@page{size: A4; margin: 1cm}';
var win = window.open(",",'width=800, height=600');
win.document.write('<html><head><style>'+css+'</style></head><body>'+div.innerHTML+'</body></html>');
win.document.close();
win.print();
win.close();
