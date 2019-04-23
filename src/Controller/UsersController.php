<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * BeforeFilter method
     *
     * @param Event $event Event event.
     *
     * @return \Cake\Http\Response|null
     *
     * The function runs before any route filtering occurs
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => [
                'Users.role_id' => $this->Users->Roles->find()->where(['name' => 'Administrator'])->first()->id
            ],
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Customers', 'Discounts', 'Products', 'Purchases']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			$user->role_id = $this->Users	// create the user as an administrator my default
								  ->Roles
								  ->find()
								  ->where(['name' => 'Administrator'])
								  ->first()
								  ->id;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method to take the user to the dashboard upon login
     *
     * @return \Cake\Http\Response|null
     * Redirects to user/index on success.
     */
    public function login()
    {
        if ($this->getRequest()->getSession()->read('Auth.User')) {
            $this->Flash->success(__('Welcome back.'));
            return $this->redirect(['controller' => 'products', 'action' => 'index']);
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if ($this->isAnAdministrator($user['role_id'])) {
                    $this->Auth->setUser($user);
                    $this->Flash->success(__('You have successfully logged in.'));
                    return $this->redirect(['controller' => 'products', 'action' => 'index']);
                }
                $this->Flash->error(__('Sorry chap. Only administrators allowed.'));
            } else {
                $this->Flash->error('Your email or password is incorrect.');
            }
        }
    }

    /**
     * Login method to take the user to the dashboard upon login
     *
     * @return \Cake\Http\Response|null
     * Redirects to user/index on success.
     */
    public function logout()
    {
        $this->Flash->success(__('You have successfully logged out.'));
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Function to verify that a user is an administrator
     * 
     * @param integer $roleId
     * 
     * @return boolean
     */
    public function isAnAdministrator ($roleId)
    {
        return $this->Users->Roles->get($roleId)->name === 'Administrator';
    } 
}
