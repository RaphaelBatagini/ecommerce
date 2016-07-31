<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{
    public $paginate = [
        'contain' => ['Users'],
        'limit' => 5,
        'order' => [
            'Products.created' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function isAuthorized($user)
    {
        // Todos os usuários registrados podem adicionar produtos
        if ($this->request->action === 'add') {
            return true;
        }

        // Apenas o proprietário do artigo pode editar e excluí
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $productId = (int)$this->request->params['pass'][0];
            if ($this->Products->isOwnedBy($productId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $products = $this->paginate($this->Products);
        $title = "Produtos";

        $this->set(compact('products'));
        $this->set(compact('title'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            $product->user_id = $this->Auth->user('id');
            $result = $this->Products->save($product);
            if ($result) {
                $this->Flash->success(__('Produto salvo.'));
                return $this->redirect(['action' => 'add-image-to-product', $result->id]);
            } else {
                $this->Flash->error(__('Falha ao tentar salvar este produto. Tente novamente!.'));
            }
        }
        $this->set('category', $this->Products->Categories->find('list'));
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            $result = $this->Products->save($product);
            if ($result) {
                $this->Flash->success(__('Produto salvo.'));
                return $this->redirect(['action' => 'add-image-to-product', $result->id]);
            } else {
                $this->Flash->error(__('Falha ao tentar salvar este produto. Tente novamente!.'));
            }
        }

        $this->set('category', $this->Products->Categories->find('list'));
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('Produto excluído.'));
        } else {
            $this->Flash->error(__('O produto não foi excluído. Tente novamente!'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function getProductsByCategory($idCategory)
    {
        $products = $this->Products->find('all')
            ->where(['Products.category_id =' => $idCategory]);
        $products = $this->paginate($products);

        $category = $this->Products->Categories->get($idCategory);

        $title = "Produtos > " . $category->name;

        $this->set(compact('products'));
        $this->set(compact('title'));
        $this->set('_serialize', ['products']);
        $this->render('index');
    }

    public function search()
    {
        if(!$this->request->is('post') || !isset($this->request->data['search']) || empty($this->request->data['search'])){
            $this->redirect(['action' => 'index']);
        }

        $search = $this->request->data['search'];
        $products = $this->Products->find('all')
            ->where(['Products.name like' => "%$search%"])
            ->orWhere(['Products.description like' => "%$search%"]);

        $products = $this->paginate($products);

        $title = "Produtos > $search";

        $this->set(compact('products'));
        $this->set(compact('title'));
        $this->set('_serialize', ['products']);
        $this->render('index');
    }

    public function addImageToProduct($id)
    {
        $product = $this->Products->get($id);
        
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    public function getGallery($path)
    {
        $gallery = scandir($path);
        unset($gallery[0]);
        unset($gallery[1]);
        foreach ($gallery as $key => $value) {
            $gallery[$key] = $path . $value;
        }
        return $gallery;
    }

    public function saveImageToProduct()
    {
        try {
            if ($this->request->is('post')) {
                $uploaddir = 'img/products/';
                $productImg = key($_FILES);
                $name = $_FILES[$productImg]['name'];
                //$nameArray = explode('.', $name);
                //$extension = end($nameArray);
                $uploadfile = $uploaddir . "$productImg.jpg";

                if (move_uploaded_file($_FILES[$productImg]['tmp_name'], $uploadfile)) {
                    $this->Flash->success(__('Upload realizado com sucesso.'));
                    return $this->redirect(['action' => 'add-image-to-product', explode('_', $productImg)[1]]);                
                } 

                $this->Flash->error(__('Upload falhou.'));
                return $this->redirect(['action' => 'add-image-to-product', explode('_', $productImg)[1]]);
            }

        } catch (\Exception $e) {
            $this->Flash->error(__('Upload falhou.'));
            return $this->redirect(['action' => 'add-image-to-product', explode('_', $productImg)[1]]);
        }
    }
}
