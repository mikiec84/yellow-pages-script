<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function startapi()
{
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if (empty($id)) {
        $id = '1';
    }
    if (isset($_GET['type'])) {
        switch ($_GET['type']) {

  case 'Get US Email results':
  header('Content-Type: application/json');
            db_connect();
            $sql = 'SELECT * FROM `us-email` WHERE `State` <> "" ORDER BY RAND() LIMIT 9';
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
      case 'Get US Email result':
      header('Content-Type: application/json');
                db_connect();
                $sql = "SELECT * FROM `us-email` WHERE `id` = '$id'";
                $result = db_query($sql);
                  if ($result === false) {
                      return false;
                  }

                $emparray = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $emparray[] = $row;
                }
                fixArrayKey($emparray);
                $response = array($emparray);
                echo json_encode($emparray);
          break;
          case 'Get US General results':
          header('Content-Type: application/json');
                    db_connect();
                    $sql = 'SELECT * FROM `us-general` WHERE `State` <> "" ORDER BY RAND() LIMIT 9';
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
              case 'Get US General result':
              header('Content-Type: application/json');
                        db_connect();
                        $sql = "SELECT * FROM `us-general` WHERE `id` = '$id'";
                        $result = db_query($sql);
                          if ($result === false) {
                              return false;
                          }

                        $emparray = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $emparray[] = $row;
                        }
                        fixArrayKey($emparray);
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
    <option>Get US Email result</option>
    <option>---------US General Database------</option>
    <option>Get US General results</option>
    <option>Get US General result</option>
	</select>
	<noscript><input type='submit' value='Submit'></noscript>
	</form>";
    }
}

function fixArrayKey(&$arr)
{
    $arr = array_combine(array_map(function ($str) {return str_replace(' ', '_', $str);}, array_keys($arr)), array_values($arr));
    foreach ($arr as $key => $val) {
        if (is_array($val)) {
            fixArrayKey($arr[$key]);
        }
    }
}
