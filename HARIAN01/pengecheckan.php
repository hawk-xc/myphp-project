<!DOCTYPE html>
<html>
<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <button onclick="return confirm('yakin?')" id="my-button">Show an Alert</button>

    <script type="text/javascript">
    var button = document.getElementById("my-button");
button.addEventListener("click", JSalert);

    function JSalert(){
    	swal("Congrats!", "Your account is created!", "success");
    }
    </script>
</body>
</html>

