<?php
if(!isUserLoggedIn() || !isset($_GET['board'])){
    header('Location: ./index.php');
}
include_once('../code/getthreads.php');
include_once('../code/getboard.php');
//print_r($boardArray);
//echo $_SESSION['username'];
$boardrows = "";
foreach ($threadArray as $row){
    if($row['board_ID'] == $_GET['board']){
        $boardrows .= <<< EOD
            <tr>
                <td>
                    <a href="?p=showthread&thread={$row['ID']}">
                        {$row['title']}
                    </a>
                </td>
                <td>
                    {$row['username']}
                </td>
                <td>
                    {$row['date_created']}
                </td>
            </tr>
        EOD;
    }
}

?>
<h1>
    <?=$board['title']?>
</h1>
<h2>
    Threads:
</h2>
<table>
    <thead>
        <tr>
            <th>Thread</th>
            <th>User</th>
            <th>Date created</th>
        </tr>
    </thead>
    <tbody>
        <?=$boardrows?>
    </tbody>
</table>
<a href="?p=">