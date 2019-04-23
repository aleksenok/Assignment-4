<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">View user</h3>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'float-right', 'style' => 'font-size: 1em']) ?>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name:</th>
                    <th scope="col"><?= h($user->name) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Email:</th>
                    <th scope="col"><?= h($user->email) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Role</th>
                    <th scope="col"><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Created On:</th>
                    <th scope="col"><?= h($user->created) ?></th>
                  </tr>
                  <tr>
                    <th scope="col">Last Changed On:</th>
                    <th scope="col"><?= h($user->modified) ?></th>
                  </tr>
                </thead>
              </table>
            </div>
      </div>