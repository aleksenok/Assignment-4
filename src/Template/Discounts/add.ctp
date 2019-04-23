<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Discount $discount
 */
?>

<div class="col-lx-12">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">Add discount</h4>
        </div>
        <div class="card-body">
            <?= $this->Form->create($discount) ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Enter the discount's percentage below...</label>
                        <?php echo $this->Form->control('percentage', ['class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Activate discount?</label>
                        <?php echo $this->Form->control('is_active', ['options' => [1 => 'Yes', 0 => 'No'], 'class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Please select the product the discount is for below...</label>
                        <?php echo $this->Form->control('product_id', ['options' => $products, 'class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Please select the user adding the discount below...</label>
                        <?php echo $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
            </div>
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
