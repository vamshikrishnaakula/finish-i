{{-- <!DOCTYPE html>

<html>

<body>

//<?php

//$age=19;

//print ($age>=18) ? "eligible for vote" : "not eligible for vote";
//$dynamicValues = ['car','bmw','bus']
?> --}}


@foreach($dynamicValues as $value)
  <div>
    <label>Field Name:</label>
    <input type="text" value="{{ $value }}">
  </div>
@endforeach

</body>

</html> --}}



//
{{-- <script>
   function getdata() {
            var val = document.getElementById('travel_arriveVia').value;

            if (val == "dropdown")
                document.getElementById("div1").innerHTML =
                //'<br><input class="input-style-1" type="text" name="opt[]"/><br><button type="button" class="btn btn-primary" onclick="adddata()" id="add_text">Add</button>';
                "<br><div class='input-style-2' ><input  class='form-control' style='width: 500px;'type='text' name='opt[]' value= {{ $mydata[0] }} /><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button><br></div> <br><div class='input-style-2' ><input class='form-control' type='text' name='opt[]' value= {{ $mydata[1] }} /><br><td><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button></div><br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
            else if (val == "other")
                document.getElementById("div1").innerHTML =
                "<br><div class='input-style-2' ><input  class='form-control' type='text' name='opt[]' value= {{ $mydata[0] }} /><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button><br></div> <br><div class='input-style-2' ><input class='form-control' type='text' name='opt[]' value= {{ $mydata[1] }} /><br><td><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button></div><br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
            else if (val == "radio")
                document.getElementById("div1").innerHTML =
                "<br><div class='input-style-2' ><input  class='form-control' type='text' name='opt[]' value= {{ $mydata[0] }} /><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button><br></div> <br><div class='input-style-2' ><input class='form-control' type='text' name='opt[]' value= {{ $mydata[1] }} /><br><td><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button></div><br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
            else if (val == "select")
                document.getElementById("div1").innerHTML =
                //'<br><input class="input-style-2" type="text" name="opt[]" value= {{ $mydata[0] }} /><button type="button" class="btn btn-danger" onclick="deletedata()"id="add_text">delete</button><br> <br><input class="input-style-2" type="text" name="opt[]" value= {{ $mydata[1] }} /><br><td><button type="button" class="btn btn-danger" onclick="deletedata()"id="add_text">delete</button><br><br><br><button type="button" class="btn btn-primary" onclick="adddata()" id="add_text">Add</button></td>';
                //"<div class='input-style-2' ><input type='text' class='form-control' name='opt[]' /><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button></div>";
                @foreach ($mydata as $val)
                    "<br>@foreach ($mydata as $val)<div class='input-style-2' ><input type='text' value='{{ $val }}'><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button><br></div>@endforeach <br><br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
                @endforeach
           
        }
</script> --}}


{{-- <button id="add_field">Add field</button>

<div id="container">

</div> --}}
{{-- 
<script>
$(document).ready(function() {
  var maxField = 10; // Maximum number of fields
  var addButton = $('#add_field'); // Add button selector
  var wrapper = $('#container'); // Fields wrapper
  var fieldHTML = '<div><input type="text" name="field_name[]"/><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; // New field HTML
  var x = 1; // Initial field counter

  // Once add button is clicked
  $(addButton).click(function() {
    // Check maximum number of fields
    if (x < maxField) {
      x++; // Increment field counter
      $(wrapper).append(fieldHTML); // Add field HTML
    }
  });

  // Once remove button is clicked
  $(wrapper).on('click', '.remove_button', function(e) {
    e.preventDefault();
    $(this).parent('div').remove(); // Remove field HTML
    x--; // Decrement field counter
  });
});
</script> --}}

{{-- <form>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name">
    <button type="button" class="btn btn-danger delete-field">Delete</button>
  </div>
  <button type="button" class="btn btn-primary add-field">Add Field</button>
</form>
<script>

    $(document).on('click', '.delete-field', function() {
    $(this).parent().remove();
    });
</script>


 //@foreach ($mydata as $value)
                else if (val == "other")
                    document.getElementById("div1").innerHTML =
                    "<br>@foreach ($mydata as $value)<div class='input-style-2' ><input  type='text' class='form-control'  name='opt[]' value= {{ $value }} /><br><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button></div>@endforeach<br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
                else if (val == "radio")
                    document.getElementById("div1").innerHTML =
                    "<br>@foreach ($mydata as $value)<div class='input-style-2' ><input  type='text'class='form-control' name='opt[]' value= {{ $value }} /><br><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button><br></div>@endforeach<br><br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
                else if (val == "select")
                    document.getElementById("div1").innerHTML =
                    "<br>@foreach ($mydata as $value)<div class='input-style-2' ><input type='text'class='form-control' name='opt[]' value='{{ $value }}'><br><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button><br></div>@endforeach <br><br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
            @endforeach --}}