<!--<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
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
  <?php
/*$db = pg_connect("host=ec2-50-19-86-139.compute-1.amazonaws.com port=5432 dbname=d3ckvlr3hl8sdn user=jwxmbirkvwexoi password=a6be799d393053f292aaf82d4a66641df5a7a28f14ec959bf373097b51bd9bf9");
if (!$db) {
  echo "An error occurred.\n";
  exit;
}
 $query = "INSERT INTO salesforce.lead VALUES ('$_POST[name]','$_POST[company]','$_POST[leadcurrency]','$_POST[leadstatus]')";*/
  
  ?>
<input type="submit" name="submit" value="Submit" onclick="<?php $result= pg_query($query); ?>">  
</form>
</body>
</html>-->
