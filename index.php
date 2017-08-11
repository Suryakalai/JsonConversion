
<html>
<head>
	<title>EXCEL TO JSON</title>
	<script src = "xlsx.full.min.js"></script>
</head>
<body>
<script type = "text/javascript">
	var url = "CCSports.xlsx";
    
	var oReq = new XMLHttpRequest();
	oReq.open("GET", url, true);
	oReq.responseType = "arraybuffer";

	oReq.onload = function(e) {
		var arraybuffer = oReq.response;
		var data = new Uint8Array(arraybuffer);
		var arr = new Array();
		for(var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
		var bstr = arr.join("");
		var workbook = XLSX.read(bstr,{type:"binary"});
		for(var j=0;j<workbook.SheetNames.length;j++) {
		
		var first_sheet_name = workbook.SheetNames[j];
		var worksheet = workbook.Sheets[first_sheet_name];
		
		var str =XLSX.utils.sheet_to_json(worksheet,{raw:true});
		//document.writeln(JSON.stringify(str));
		var output = JSON.stringify(str);
		//document.writeln(XLSX.utils.sheet_to_json(worksheet,{raw:true}));
		//console.log(JSON.parse(JSON.stringify(XLSX.utils.sheet_to_json(worksheet,{raw:true}))));
		document.getElementById("hidden1").value = "hello";
}

oReq.send();
file.close();
</script>
<form name="myform" action="{$_SERVER['PHP_SELF']}" method="post" id="myform">
	<input type="button" name="hidden1" id="hidden1" >
</form>

</body>
</head>
</html>
