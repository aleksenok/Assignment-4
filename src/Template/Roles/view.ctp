<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">View role</h3>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id], ['class' => 'float-right', 'style' => 'font-size: 1em']) ?>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name:</th>
                    <th scope="col"><?= h($role->name) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Created On:</th>
                    <th scope="col"><?= h($role->created) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Last Changed On:</th>
                    <th scope="col"><?= h($role->modified) ?></th>
                  </tr>
                </thead>
              </table>
            </div>
      </div>