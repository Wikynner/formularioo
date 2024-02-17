<?php require 'config.php';

$pd0= new PDO("mysql:dbname=.$db_name.;host=$db_host","$db_user", "$db_pass");
$lista = [];
$sql = $pdo->query("SELECT * FROM arquivo");
if($sql->rowCount() > 0){
    $lista = $sql->fechAll(PDO::FETCH_ASSOC);
}
    ?>
    <a href="Adicionar.php">ADICIONAR</a>
    <table border="1" width="100%">
    <tr>
        <th>iD</th>
        <th>Descrição</th>
        <th>SESSAO</th>
        <th>Departamento</th>
        </tr>
    <?php foreach($lista as $id); ?>
        <tr>
            <td><?php echo $id['id'];?></td>
            <td><?php echo $id['desc'];?></td>
            <td><?php echo $id['ses'];?></td>
            <td><?php echo $id['dep'];?></td>
        </tr>
    <?php ?>

    </table>
