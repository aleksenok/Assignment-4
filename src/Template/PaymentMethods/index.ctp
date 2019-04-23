<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentMethod[]|\Cake\Collection\CollectionInterface $paymentMethods
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Payment methods</h3>
              <?= $this->Html->link(__('Add payment method'), ['action' => 'add'], ['class' => 'float-right', 'style' => 'font-size: 1em']) ?>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
              <?php if (sizeof($paymentMethods) > 0) {?>
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><?=$this->Paginator->sort('name')?></th>
                    <th scope="col"><?=$this->Paginator->sort('created')?></th>
                    <th scope="col"><?=$this->Paginator->sort('modified')?></th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($paymentMethods as $paymentMethod): ?>
                    <tr>
                        <td><?=h($paymentMethod->name)?></td>
                        <td><?=h($paymentMethod->created)?></td>
                        <td><?=h($paymentMethod->modified)?></td>
                        <td class="actions">
                            <?=$this->Html->link(__('View'), ['action' => 'view', $paymentMethod->id])?> |
                            <?=$this->Html->link(__('Edit'), ['action' => 'edit', $paymentMethod->id])?> |
                            <?=$this->Form->postLink(__('Delete'), ['action' => 'delete', $paymentMethod->id], ['confirm' => __('Are you sure you want to delete {0}?', $paymentMethod->name)])?>
                        </td>
                    </tr>
                    <?php endforeach;} else {?>
                    <p class="text-center">You have no payment methods in the system.</p>
                <?php }?>
                </tbody>
              </table>
              <div class="paginator ml-4 mt-3">
              <?php if (sizeof($paymentMethods) > 0) {?>
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