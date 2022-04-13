<?php

namespace app\controllers;

use app\models\Beneficio;
use app\models\BeneficioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BeneficioController implements the CRUD actions for Beneficio model.
 */
class BeneficioController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
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
     * Lists all Beneficio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BeneficioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Beneficio model.
     * @param int $id_beneficio Id Beneficio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_beneficio)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_beneficio),
        ]);
    }

    /**
     * Creates a new Beneficio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Beneficio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_beneficio' => $model->id_beneficio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Beneficio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_beneficio Id Beneficio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_beneficio)
    {
        $model = $this->findModel($id_beneficio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_beneficio' => $model->id_beneficio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Beneficio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_beneficio Id Beneficio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_beneficio)
    {
        $this->findModel($id_beneficio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Beneficio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_beneficio Id Beneficio
     * @return Beneficio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_beneficio)
    {
        if (($model = Beneficio::findOne(['id_beneficio' => $id_beneficio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
