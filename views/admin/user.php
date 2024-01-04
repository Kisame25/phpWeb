<table class="table">
  <thead class="sticky-top">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if (isset($searchMessage)): ?>
      <h4 class="mt-5 text-center fw-bold"><?= $searchMessage ?></h4>
    <?php else: ?>
      <?php foreach ($resultData as $user): ?>
        <tr>
          <th scope="row"><?= $user['id'] ?></th>
          <td><?= $user['username'] ?></td>
          <td><?= $user['email'] ?></td>
          <td>
            <a class="btn btn-danger" href="/administrator/users?id=<?= $user['id'] ?>" >Delete</a>
          </td>
      </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>