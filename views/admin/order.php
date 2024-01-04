<table class="table">
  <thead class="sticky-top">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Photo</th>
      <th scope="col">Price</th>
      <th scope="col">Orders</th>
      <th scope="col">Totale</th>
      <th scope="col">Email Order</th>
      <th scope="col">Address</th>
      <th scope="col">Order date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if (isset($searchMessage)): ?>
      <h4 class="mt-5 text-center fw-bold"><?= $searchMessage ?></h4>
    <?php else: ?>
      <?php foreach ($resultData as $order): ?>
        <tr>
          <th scope="row"><?= $order['id'] ?></td>
          <td><?= $order['product_name'] ?></td>
          <td>
            <img src="/<?= $order['product_image']?>" alt="<?= $order['product_image'] ?>" width="40px" height="40px">  
          </td>
          <td><?= $order['price'] ?></td>
          <td><?= $order['n_orders'] ?></td>
          <td><?= $order['totale'] ?></td>
          <td><?= $order['email'] ?></td>
          <td><?= $order['address'] ?></td>
          <td><?= $order['order_date'] ?></td>
          <td>
            <p class="text-success">Accepted</p>
          </td>
      </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>