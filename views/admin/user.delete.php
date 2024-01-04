<?php if (isset($message)): ?>
    <h4 class="mt-5 text-center fw-bold"><?= $message ?></h4>
<?php else: ?>
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
            <?php foreach ($resultData as $user): ?>
                <tr>
                    <th scope="row"><?= $user['id'] ?></th>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <a class="btn btn-success" href="/administrator/back-up/users?id=<?= $user['id'] ?>" >Back-up</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
