<?php
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/zadanie/db.php';
$prodq = $pdo->prepare('SELECT products.*, sum(uchet_tovarov.amount) as amount from products left join uchet_tovarov on uchet_tovarov.product_id = products.id group by products.id');
$prodq->execute();
$prod= $prodq->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
     <a href="/zadanie/arrivals.php" id="arr">Arrivals</a>
     <table>
        <tr><td>Name</td><td>Cost</td><td>Amount</td><td>Article</td><td><a href="/zadanie/create.php" id="create">Add new product</a></td><td><a href="/zadanie/postup.php" id="#postup">Add arrive of product</a></td></tr>
        <?foreach($prod as $pr):?>
           <?if($pr['amount'] == null){$pr['amount']=0;}
?>
           <tr>
           <td><?=$pr['name']?></td>
           <td><?=$pr['how_much']?></td>
           <td><?=$pr['amount']?></td>
           <td><?=$pr['id']?></td>
           </tr> 
        <?endforeach?>
     </table> 
    </body>
</html>
