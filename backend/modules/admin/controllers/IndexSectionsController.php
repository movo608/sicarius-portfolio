<?php

namespace app\modules\admin\controllers;

use Yii;
use common\models\IndexSections;
use app\modules\admin\models\IndexSectionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\components\ImageUploadComponent;

/**
 * IndexSectionsController implements the CRUD actions for IndexSections model.
 */
class IndexSectionsController extends Controller
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
     * Lists all IndexSections models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IndexSectionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IndexSections model.
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
     * Creates a new IndexSections model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        // get new model and set scenario
        $model = new IndexSections(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post())) {

            $model->image = UploadedFile::getInstance($model, 'image');

            // if the image can be uploaded, redirect to view file and display flash message ...
            if (ImageUploadComponent::upload($model)) {
                Yii::$app->session->setFlash('success', 'Index Section added.');

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
     * Updates an existing IndexSections model.
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

            if ($model->image) {
                $model->image = UploadedFile::getInstance($model, 'image');

                if (Yii::$app->UpdateComponent->update($model)) {
                    Yii::$app->session->setFlash('success', 'Changes have been saved.');

                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Proccess could not be successfully completed.');

                    return $this->render('update', [
                        'model' => $model
                    ]);
                }
            } else {
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }            

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IndexSections model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/admin/index-sections']);
    }

    /**
     * Finds the IndexSections model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IndexSections the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IndexSections::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
