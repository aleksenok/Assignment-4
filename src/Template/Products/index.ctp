<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Products</h3>
              <?= $this->Html->link(__('Add product'), ['action' => 'add'], ['class' => 'float-right', 'style' => 'font-size: 1em']) ?>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
              <?php if (sizeof($products) > 0) {?>
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><?=$this->Paginator->sort('name')?></th>
                    <th scope="col"><?=$this->Paginator->sort('price')?></th>
                    <th scope="col"><?=$this->Paginator->sort('is_available')?></th>
                    <th scope="col">Category</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col"><?=$this->Paginator->sort('created')?></th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?=h($product->name)?></td>
                        <td><?=h($product->price)?></td>
                        <td><?=h($product->is_available ? 'Yes' : 'No')?></td>
                        <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
                        <td><?= $product->has('manufacturer') ? $this->Html->link($product->manufacturer->name, ['controller' => 'Manufacturers', 'action' => 'view', $product->manufacturer->id]) : '' ?></td>
                        <td><?=h($product->created)?></td>
                        <td class="actions">
                            <?=$this->Html->link(__('View'), ['action' => 'view', $product->id])?> |
                            <?=$this->Html->link(__('Edit'), ['action' => 'edit', $product->id])?> |
                            <?=$this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete {0}?', $product->name)])?>
                        </td>
                    </tr>
                    <?php endforeach;} else {?>
                    <p class="text-center">You have no products in the system.</p>
                <?php }?>
                </tbody>
              </table>
              <div class="paginator ml-4 mt-3">
              <?php if (sizeof($products) > 0) {?>
                <ul class="pagination">
                <?=$this->Paginator->first('<< ')?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<?=$this->Paginator->prev('< ')?>&nbsp;&nbsp;
                    &nbsp;&nbsp;<?=$this->Paginator->next(' >')?>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?=$this->Paginator->last(' >>')?>
                </ul>
                <p><?=$this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')])?></p>
              <?php }?>
                </div>
            </div>
      </div>