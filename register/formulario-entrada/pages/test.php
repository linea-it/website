<?php

$valores = isset($_POST['check']) ? $_POST['check'] : array();

foreach($valores as $value => $k) {
    echo $value . '-'.$k.'<br/>';
}
?>
<html>
<head>

</head>
<body>
    <form method="POST">
        <input name="check[]" type="checkbox" value="1">1</input><br/>
        <input name="check[]" type="checkbox" value="2">2</input><br/>
        <input name="check[]" type="checkbox" value="3">3</input><br/>
        <input name="check[]" type="checkbox" value="4">4</input><br/>
        <input name="check[]" type="checkbox" value="5">5</input><br/>

        <input type="submit" value="Submit"/>
    </form>
</body>
</html>
