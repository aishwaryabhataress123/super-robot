<html>
<head>
<style>
.error {color: #FF0000;}
</style>
  <script type="text/javascript">
    function checkstate()
    {
      if($_POST[state]=="Maharashtra")
      {
        return 'mh.php' ;
      }
      else
      {
        return 'nonmh.php' ;
      }
    }
  </script>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $companyErr = $stateErr = "";
$name = $company = $leadcurrency = $leadstatus = $state = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["name"])) {
$nameErr = "Name is required";
} else {
$name = test_input($_POST["name"]);
// check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed"; 
}
}
if (empty($_POST["company"])) {
$companyErr = "Company is required";
} else {
$company = test_input($_POST["company"]);
// check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$company)) {
  $companyErr = "Only letters and white space allowed"; 
}
}
}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="checkstate();"> 
<table>
<tr>
  <td> Name:</td>
  <td> <input type="text" name="name" value="<?php echo $name;?>"></td>
  <td><span class="error">* <?php echo $nameErr;?></span></td>
</tr>
<tr>
  <td>Company:</td> 
  <td><input type="text" name="company" value="<?php echo $company;?>"></td>
  <td><span class="error">* <?php echo $companyErr;?></span></td>
</tr>
  <tr>
  <td>State:</td> 
  <td><input type="text" name="state" value="<?php echo $state;?>"></td>
  <td><span class="error">* <?php echo $stateErr;?></span></td>
</tr>
<tr>
  <td>Lead Currency :</td> 
  <td>
    <select name="leadcurrency" value="leadcurrency">
      <option value="u.s.dollar">U.S. Dollar</option>
      <option value="euro">Euro</option>
    </select>
  </td>
</tr>
<tr>
  <td>Lead Status :</td> 
  <td>
    <select name="leadstatus" value="leadstatus">
      <option value="open">Open</option>
      <option value="contacted">Contacted</option>
      <option value="qualified">Qualified</option>
      <option value="unqualified">Unqualified</option>
    </select>
  </td>
</tr>
</table>

<input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>
   <?php
$db = pg_connect("host=ec2-54-235-177-183.compute-1.amazonaws.com port=5432 dbname=d98o3g9bql0opl user=xkruwpvaqjlakg password=8771612f12079078d75eb98f62f1e9f58dcd8e0cf949d160a90bf4ffbba96982");
if (!$db) {
  echo "An error occurred.\n";
  exit;
}
//$query = "INSERT INTO salesforce.lead VALUES ('$_POST[name]','$_POST[company]','$_POST[leadcurrency]','$_POST[leadstatus]')";
//$query = "insert into salesforce.lead (name,status) values ('vish','open');"; 
$query = "INSERT INTO salesforce.lead(lastname,state,company, status)	VALUES ('$_POST[name]','$_POST[state]','$_POST[company]', '$_POST[leadstatus]');";
$result= pg_query($query);

  ?>

