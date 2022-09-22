<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <input type="text" id="fname">
    <br><br>
    <input type="text" id="james">
    <script type="text/javascript">
    document.getElementById("fname").addEventListener("input", function(){
      document.getElementById("james").value = this.value;
    });

    document.getElementById("james").addEventListener("input", function(){
      document.getElementById("fname").value = this.value;
    });
    </script>
  </body>
</html>
