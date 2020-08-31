<?php
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}
include_once('../code/getboards.php');
//print_r($boardArray);
//echo $_SESSION['username'];

?>
<h1>
    Boards:
</h1>
<table>
    <thead>
        <tr>
            <th>Board name</th>
            <th>Board description</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($boardArray as $row){
?>
        <tr>
            <td>
                <a href="?p=showthreads&board=<?=$row[0]?>">
                    <?=$row[1]?>
                </a>
            </td>
            <td>
                <?=$row[2]?>
            </td>
        </tr>
<?php
    }
?>
    </tbody>
</table>