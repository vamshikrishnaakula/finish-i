<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function(){
      $("select").change(function(){
        var selectedOption = $(this).children("option:selected").val();
        if(selectedOption === "clear"){
          $(".field input").val("");
        }
      });
    });
  </script>
</head>
<body>
  <div class="field">
    <input type="text">
    <select>
      <option>select option</option>
      <option value="clear">clear</option>
    </select>
  </div>
</body>
</html>
