<main>
  <h1>
    <?= ('hello world!');?>
  </h1>

  <?php 
    $query = 'SELECT * from users';  
    $prepare = $db->query($query);   
    $users = $prepare->fetchAll();     
    $nb = $prepare ->rowCount();
  ?>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($users as $user) { ?>
      <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['firstname'] ?></td>
        <td><?= $user['lastname'] ?></td>
      </tr>
    <?php } ?>
  <tbody>
  </table>
</main>