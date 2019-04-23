<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Discount $discount
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">View discount</h3>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $discount->id], ['class' => 'float-right', 'style' => 'font-size: 1em']) ?>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Percentage:</th>
                    <th scope="col"><?= h($discount->percentage) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Active?</th>
                    <th scope="col"><?= h($discount->is_active ? 'Yes' : 'No') ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col"><?= $discount->has('product') ? $this->Html->link($discount->product->name, ['controller' => 'Products', 'action' => 'view', $discount->product->id]) : '' ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Added by:</th>
                    <th scope="col"><?= $discount->has('user') ? $this->Html->link($discount->user->name, ['controller' => 'Users', 'action' => 'view', $discount->user->id]) : '' ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Created On:</th>
                    <th scope="col"><?= h($discount->created) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Last Changed On:</th>
                    <th scope="col"><?= h($discount->modified) ?></th>
                  </tr>
                </thead>
              </table>
            </div>
      </div>
