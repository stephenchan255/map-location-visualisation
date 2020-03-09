<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Places Search Box</title>
</head>

<body>
<div class="container my-5">
    <h3 class="text-center">Address processor</h3>
    <form action="map.php" method="POST">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-right my-auto">Address</label>
            <div class="col-sm-10" id="addr">
                <input type="text" id="pac-input_0" name="addr[]" placeholder="Input Address" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <input type="button" class="btn btn-secondary" onclick="addInput()" value="Add more">
                <input type="button" class="btn btn-secondary" onclick="removeInput()" value="Remove last one">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </div>
    </form>
</div>

<!--Load the API from the specified URL
* The async attribute: allows the browser to render the page while the API loads
* The callback parameter executes the initMap() function
-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4wXyYFhTs8ds_Ppa4jWL3HQEhWRu_Yao&libraries=places&callback=initAutocomplete"
         async defer>
</script>

<script>
    var index = 0;

    function addInput() {
        $(document).ready(function(){
            index++;
            var newInput = '<input id=\"pac-input_' + index + '\" type=\"text\" placeholder=\"Input Address\" name=\"addr[]\" class=\"form-control mt-3\">\n'
            $("#addr").append(newInput);
            initAutocomplete();
        });  
    }

    function removeInput() {
        $(document).ready(function(){
            var address = $("#addr");
            if (address.children().length > 1) {
                address.children("input:last").remove();
            }
            index--;
            initAutocomplete();
        });
    }

    function initAutocomplete() {
        console.log(index);
        for (var i = 0; i <= index; i++) {
            console.log('pac-input_'+ i);
            var input = document.getElementById('pac-input_'+ i);
            new google.maps.places.SearchBox(input);
        }
    }
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous">
</script>
</body>
</html>