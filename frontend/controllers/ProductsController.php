<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Products;
use frontend\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    //'only' => ['logout', 'signup', 'index'],
                    'rules' => [
                        [
                            'actions' => ['create', 'update', 'view', 'delete', 'index'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())){ 
                
            $link_to_picture_of_tile = UploadedFile::getInstance($model, 'link_to_picture_of_tile');
                
            $link_to_picture_flown = UploadedFile::getInstance($model, 'link_to_picture_flown');
            $link_to_picture_ground_support = UploadedFile::getInstance($model, 'link_to_picture_ground_support');
            $alias = Yii::getAlias("@frontend/web/uploads/products");
            BaseFileHelper::createDirectory($alias);
            
            
            if (!empty($link_to_picture_of_tile)) {
                $filename0 = 'tile'.time(); 
                $name0 = $filename0 . '.' . $link_to_picture_of_tile->extension;
                $path0 = $alias . DIRECTORY_SEPARATOR . $name0;
                $model->link_to_picture_of_tile = $name0;
                $link_to_picture_of_tile->saveAs($path0);
			} 
            
            if (!empty($link_to_picture_flown)) {
                $filename = 'flown'.time(); 
                $name = $filename . '.' . $link_to_picture_flown->extension;
                $path = $alias . DIRECTORY_SEPARATOR . $name;
                $model->link_to_picture_flown = $name;
                $link_to_picture_flown->saveAs($path);
			} 
            if (!empty($link_to_picture_ground_support)) {
                $filename = 'ground'.time(); 
                $name = $filename . '.' . $link_to_picture_ground_support->extension;
                $path = $alias . DIRECTORY_SEPARATOR . $name;
                $model->link_to_picture_ground_support = $name;
                $link_to_picture_ground_support->saveAs($path);
			}
  
                if($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $file_tile = $model->link_to_picture_of_tile;
        $file_flown = $model->link_to_picture_flown;
        $file_ground = $model->link_to_picture_ground_support;

        if ($this->request->isPost && $model->load($this->request->post())){
            
            
            
            $link_to_picture_of_tile = UploadedFile::getInstance($model, 'link_to_picture_of_tile');
            $link_to_picture_flown = UploadedFile::getInstance($model, 'link_to_picture_flown');
            $link_to_picture_ground_support = UploadedFile::getInstance($model, 'link_to_picture_ground_support');
            $alias = Yii::getAlias("@frontend/web/uploads/products");
            BaseFileHelper::createDirectory($alias);
            
            if($link_to_picture_of_tile){
                if($file_tile) {
                $path0 = Yii::getAlias("@frontend").'/web/uploads/products/'.$file_tile;
                if(file_exists($path0)){unlink($path0);}
                }

                $filename0 = 'tile'.time(); 
                $name0 = $filename0 . '.' . $link_to_picture_of_tile->extension;
                $path0 = $alias . DIRECTORY_SEPARATOR . $name0;
                $model->link_to_picture_of_tile = $name0;
                                    
                $link_to_picture_of_tile->saveAs($path0);
			}else{$model->link_to_picture_of_tile = $file_tile;}
            
            
            if($link_to_picture_flown){
                if($file_flown) {
                $path1 = Yii::getAlias("@frontend").'/web/uploads/products/'.$file_flown;
                if(file_exists($path1)){unlink($path1);}
                }

                $filename = 'flown'.time(); 
                $name = $filename . '.' . $link_to_picture_flown->extension;
                $path = $alias . DIRECTORY_SEPARATOR . $name;
                $model->link_to_picture_flown = $name;
                                    
                $link_to_picture_flown->saveAs($path);
			}else{$model->link_to_picture_flown = $file_flown;}
            
            if($link_to_picture_ground_support){
                if($file_ground) {
                $path1 = Yii::getAlias("@frontend").'/web/uploads/products/'.$file_ground;
                if(file_exists($path1)){unlink($path1);}
                }

                $filename = 'ground'.time(); 
                $name = $filename . '.' . $link_to_picture_ground_support->extension;
                $path = $alias . DIRECTORY_SEPARATOR . $name;
                $model->link_to_picture_ground_support = $name;
                                    
                $link_to_picture_ground_support->saveAs($path);
			}else{$model->link_to_picture_ground_support = $file_ground;}
            
            
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        if($model->link_to_picture_of_tile){
        $path0 = Yii::getAlias("@frontend").'/web/uploads/products/'.$model->link_to_picture_of_tile;
        if(file_exists($path0)){unlink($path0);}
        }
        if($model->link_to_picture_flown){
        $path1 = Yii::getAlias("@frontend").'/web/uploads/products/'.$model->link_to_picture_flown;
        if(file_exists($path1)){unlink($path1);}
        }
        if($model->link_to_picture_ground_support){
        $path1 = Yii::getAlias("@frontend").'/web/uploads/products/'.$model->link_to_picture_ground_support;
        if(file_exists($path1)){unlink($path1);}
        }
                
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
