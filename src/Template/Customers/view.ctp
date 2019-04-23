<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">View customer</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name:</th>
                    <th scope="col"><?= h($customer->user->name) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Email:</th>
                    <th scope="col"><?= h($customer->user->email) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Payment Method</th>
                    <th scope="col"><?= $customer->has('payment_method') ? $this->Html->link($customer->payment_method->name, ['controller' => 'PaymentMethods', 'action' => 'view', $customer->payment_method->id]) : '' ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Shipment Address:</th>
                    <th scope="col"><?= h($customer->shipment_address) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Created On:</th>
                    <th scope="col"><?= h($customer->created) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Last Changed On:</th>
                    <th scope="col"><?= h($customer->modified) ?></th>
                  </tr>
                </thead>
              </table>
            </div>
      </div>

<?php if (!empty($customer->user->purchases)) { ?>
      <div class="row mt-3">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0"><?= $customer->user->name . "'s" ?> Purchases</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Purchased on</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($customer->user->purchases as $purchase): ?>
                    <tr>
                        <td><?=h($purchase->product->name)?></td>
                        <td><?=h($purchase->created)?></td>
                        <td><?=h($purchase->product->price)?></td>
                        <td><?= $this->Html->link('Click here...', $purchase->product->img_url, ['target' => '_blank'] ) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
      </div>
<?php } ?>