<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>

<body>
    <h1>Fibers</h1>
    <button id="btn-api" type="button">Call API</button>
    <div id="result"></div>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("btn-api").addEventListener("click", function() {
              fetch("http://samples.test:8000/fibers/fibers_call_api.php")
            });
        });
    </script>
</body>

</html>
