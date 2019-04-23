<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">View product</h3>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' => 'float-right', 'style' => 'font-size: 1em']) ?>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name:</th>
                    <th scope="col"><?= h($product->name) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Price:</th>
                    <th scope="col"><?= h($product->price) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Available?</th>
                    <th scope="col"><?= h($product->is_available ? 'Yes' : 'No') ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Category:</th>
                    <th scope="col"><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Manufacturer:</th>
                    <th scope="col"><?= $product->has('manufacturer') ? $this->Html->link($product->manufacturer->name, ['controller' => 'Manufacturers', 'action' => 'view', $product->manufacturer->id]) : '' ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Path to image:</th>
                    <th scope="col"><?= $this->Html->link('Click here...', $product->img_url, ['target' => '_blank'] ) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Added by:</th>
                    <th scope="col"><?= $product->has('user') ? $this->Html->link($product->user->name, ['controller' => 'Users', 'action' => 'view', $product->user->id]) : '' ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Created On:</th>
                    <th scope="col"><?= h($product->created) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Last Changed On:</th>
                    <th scope="col"><?= h($product->modified) ?></th>
                  </tr>
                </thead>
              </table>
            </div>
      </div>