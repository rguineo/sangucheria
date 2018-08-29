<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="lib/css/select2.css">
	<script src=""></script>
	<script type="text/javascript" src="lib/js/select2.js"></script>
	<script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.producto').select2({placeholder:"Seleccione un producto", allowClear:true});
        });

	</script>

</head>
<body>
	
</body>
<select class="producto col-md-4">
	        <option></option>
          <optgroup label="Alaskan/Hawaiian Time Zone">
            <option value="AK">Alaska</option>
            <option value="HI" disabled="disabled">Hawaii</option>
          </optgroup>
          <optgroup label="Pacific Time Zone">
            <option value="CA">California</option>
            <option value="NV">Nevada</option>
            <option value="OR">Oregon</option>
            <option value="WA">Washington</option>
          </optgroup>
          <optgroup label="Mountain Time Zone">
            <option value="AZ">Arizona</option>
            <option value="CO">Colorado</option>
            <option value="ID">Idaho</option>
            <option value="MT">Montana</option><option value="NE">Nebraska</option>
            <option value="NM">New Mexico</option>
            <option value="ND">North Dakota</option>
            <option value="UT">Utah</option>
            <option value="WY">Wyoming</option>
          </optgroup>
          <optgroup label="Central Time Zone">
            <option value="AL">Alabama</option>
            <option value="AR">Arkansas</option>
            <option value="IL">Illinois</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="OK">Oklahoma</option>
            <option value="SD">South Dakota</option>
            <option value="TX">Texas</option>
            <option value="TN">Tennessee</option>
            <option value="WI">Wisconsin</option>
          </optgroup>
          <optgroup label="Eastern Time Zone">
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="IN">Indiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="OH">Ohio</option>
            <option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
            <option value="VT">Vermont</option><option value="VA">Virginia</option>
            <option value="WV">West Virginia</option>
          </optgroup>
          <option value="TNOGZ" disabled="disabled">The No Optgroup Zone</option>
          <option value="TPZ">The Panic Zone</option>
          <option value="TTZ">The Twilight Zone</option>
</select>


</html>
