<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<div class="col-lx-12">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">Edit category</h4>
          <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Are you sure you want to delete {0}?', $category->name)],
                ['class' => 'pull-right']
            )
        ?></li>
        </div>
        <div class="card-body">
            <?= $this->Form->create($category) ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Enter the category's name below...</label>
                        <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                </div>
            </div>
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
