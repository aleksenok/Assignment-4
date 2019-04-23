<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentMethod $paymentMethod
 */
?>

<div class="col-lx-12">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">Edit payment method</h4>
          <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paymentMethod->id],
                ['confirm' => __('Are you sure you want to delete {0}?', $paymentMethod->name)],
                ['class' => 'pull-right']
            )
        ?></li>
        </div>
        <div class="card-body">
            <?= $this->Form->create($paymentMethod) ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Enter the payment method's name below...</label>
                        <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
            </div>
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
