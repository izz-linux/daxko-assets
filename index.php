<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <title>Asset Management</title>
	<style>label { display: inline-block; width: 100px; text-align: right; padding-right: 10px; padding-bottom: 10px;}</style>
  </head>
  <p><body>
    <h2>Asset Management Access</h2>
    <p>You  may search either by Name, IP Address, or OS of computers</p>
    <form  method="post" action="search.php?assets" id="searchform">
      <label for="name">Name  </label><input type="text" name="name"><br>
      <label for="ip">IP Address  </label><input type="text" name="ip"><br>
      <label for="os">OS  </label><input type="text" name="os"><br><br>
      <label for="submit"></label><input type="submit" name="submit" value="Search">
    </form>
    <br>
    <hr>
    <p>Please enter the name of the computer to input into Asset Management</p>
    <form  method="post" action="add.php?addme" id="addform">
      <label for="name">Name  </label><input type="text" name="name"><br>
      <label for="ip">IP Address  </label><input type="text" name="ip"><br>
      <label for="os">OS  </label>
        <select name="os">
          <option value="">--Choose an OS--</option>
          <option value="Linux">Linux</option>
          <option value="Mac">Mac</option>
          <option value="Other">Other</option>
          <option value="Windows">Windows</option>
        </select><br><br>
      <label for="submit"></label><input type="submit" name="submit" value="Add">
    </form>
  </body>
</html>
</p>
