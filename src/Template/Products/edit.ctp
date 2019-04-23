<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="col-lx-12">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">Edit product</h4>
        </div>
        <div class="card-body">
            <?= $this->Form->create($product) ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Enter the product's name below...</label>
                        <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Enter the product's price below...</label>
                        <?php echo $this->Form->control('price', ['class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Is the product available?</label>
                        <?php echo $this->Form->control('is_available', ['options' => [1 => 'Yes', 0 => 'No'], 'class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Enter the path to the product's image below...</label>
                        <?php echo $this->Form->control('img_url', ['class' => 'form-control', 'type' => 'text', 'label' => false, 'required']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Please select the product's category below</label>
                        <?php echo $this->Form->control('category_id', ['options' => $categories, 'class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Please select the product's manufacturer below</label>
                        <?php echo $this->Form->control('manufacturer_id', ['options' => $manufacturers, 'class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
            </div>
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
      </div>
    </div>