<html>
<body onload="time()";>
<script type="text/javascript">

function time()
{
  var now = new Date();
  var time = now.getHours() + ":" +now.getMinutes() + ":" + now.getSeconds();
  document.getElementById("alkisti").innerHTML=time;


}      

</script>

<div id="alkisti"> </div>
</body>
</html>
