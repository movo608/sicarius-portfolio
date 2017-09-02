<?php

namespace app\modules\admin\controllers;

use Yii;
use common\models\PhotoGalleryCategories;
use app\modules\admin\models\PhotoGalleryCategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
* Component used to upload an image to the server
*/
use backend\components\ImageUploadComponent;

/**
 * PhotoGalleryCategoriesController implements the CRUD actions for PhotoGalleryCategories model.
 */
class PhotoGalleryCategoriesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PhotoGalleryCategories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhotoGalleryCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhotoGalleryCategories model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PhotoGalleryCategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // create new model, based on the 'create' scenario
        $model = new PhotoGalleryCategories(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post())) {

            $model->image = UploadedFile::getInstance($model, 'image');

            // if the image can be uploaded, redirect to view file and display flash message ...
            if (ImageUploadComponent::upload($model)) {
                Yii::$app->session->setFlash('success', 'Image uploaded. Category added.');

                return $this->redirect(['view', 'id' => $model->id]);
            // ... else display error flash message and redisplay create page
            } else {
                Yii::$app->session->setFlash('error', 'Proccess could not be successfully completed.');

                return $this->render('create', [
                    'model' => $model
                ]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PhotoGalleryCategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // set scenario as update
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {

            $model->image = UploadedFile::getInstance($model, 'image');

            if (Yii::$app->ImageUploadComponent->upload($model)) {
                Yii::$app->session->setFlash('success', 'Changes have been saved.');

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', 'Proccess could not be successfully completed.');

                return $this->render('update', [
                    'model' => $model
                ]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PhotoGalleryCategories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/admin/photo-gallery-categories']);
    }

    /**
     * Finds the PhotoGalleryCategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PhotoGalleryCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PhotoGalleryCategories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
}
