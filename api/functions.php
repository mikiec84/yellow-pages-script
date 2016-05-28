<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function startapi()
{
    if (isset($_GET['type'])) {
        switch ($_GET['type']) {

  case 'Get US Email results':
  header('Content-Type: application/json');
            db_connect();
            $sql = 'SELECT * FROM `us-email`';
            $result = db_query($sql);
              if ($result === false) {
                  return false;
              }

            $emparray = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
            $response = array($emparray);
            echo json_encode($emparray);
      break;

}
    } else {
        echo "<form>
	<select name='type' onchange='this.form.submit()'>
		<option selected>Select api response</option>
    <option>---------US Email Database------</option>
    <option>Get US Email results</option>
	</select>
	<noscript><input type='submit' value='Submit'></noscript>
	</form>";
    }
}
