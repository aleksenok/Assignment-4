<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Discount[]|\Cake\Collection\CollectionInterface $discounts
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Discounts</h3>
              <?= $this->Html->link(__('Add discount'), ['action' => 'add'], ['class' => 'float-right', 'style' => 'font-size: 1em']) ?>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
              <?php if (sizeof($discounts) > 0) {?>
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><?=$this->Paginator->sort('percentage')?></th>
                    <th scope="col">Active?</th>
                    <th scope="col">Product</th>
                    <th scope="col">Added by</th>
                    <th scope="col"><?=$this->Paginator->sort('created')?></th>
                    <th scope="col"><?=$this->Paginator->sort('modified')?></th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($discounts as $discount): ?>
                    <tr>
                        <td><?=h($discount->percentage)?></td>
                        <td><?=h($discount->is_active ? 'Yes' : 'No')?></td>
                        <td><?= $discount->has('product') ? $this->Html->link($discount->product->name, ['controller' => 'Products', 'action' => 'view', $discount->product->id]) : '' ?></td>
                        <td><?= $discount->has('user') ? $this->Html->link($discount->user->name, ['controller' => 'Users', 'action' => 'view', $discount->user->id]) : '' ?></td>
                        <td><?=h($discount->created)?></td>
                        <td><?=h($discount->modified)?></td>
                        <td class="actions">
                            <?=$this->Html->link(__('View'), ['action' => 'view', $discount->id])?> |
                            <?=$this->Html->link(__('Edit'), ['action' => 'edit', $discount->id])?> |
                            <?=$this->Form->postLink(__('Delete'), ['action' => 'delete', $discount->id], ['confirm' => __('Are you sure you want to delete {0}?', $discount->name)])?>
                        </td>
                    </tr>
                    <?php endforeach;} else {?>
                    <p class="text-center">You have no discounts in the system.</p>
                <?php }?>
                </tbody>
              </table>
              <div class="paginator ml-4 mt-3">
              <?php if (sizeof($discounts) > 0) {?>
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