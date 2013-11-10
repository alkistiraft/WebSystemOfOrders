<html>
<body>
<table border="1">
<tr>  
  <td id="(1,1)" onclick="oxGame(this);" width="10" height="10">.</td>
  <td id="(1,2)" onclick="oxGame(this);" width="10" height="10">.</td>
  <td id="(1,3)" onclick="oxGame(this);" width="10" height="10">.</td>
</tr>

<tr>  
  <td id="(2,1)" onclick="oxGame(this);" width="10" height="10">.</td>
  <td id="(2,2)" onclick="oxGame(this);" width="10" height="10">.</td>
  <td id="(2,3)" onclick="oxGame(this);" width="10" height="10">.</td>

</tr>

<tr>  
  <td id="(3,1)" onclick="oxGame(this);" width="10" height="10">.</td>
  <td id="(3,2)" onclick="oxGame(this);" width="10" height="10">.</td>
  <td id="(3,3)" onclick="oxGame(this);" width="10" height="10">.</td>

</tr>
</table>

<script type="text/javascript">

function oxGame(cellref)
 {
  cellref.innerHTML = "x";
  for (var i=1;i<=3;i++) {
		var found = false;

	for (var j=1;j<=3;j++) {
		var curEl = document.getElementById("(" + i +"," + j +")");
		if (curEl.innerHTML == ".") {
			curEl.innerHTML="O";
			found = true;
			break;
		}
	}
	if (found) {
		break;
	}
  }  

  
 }
</script>


</body>
</html>
