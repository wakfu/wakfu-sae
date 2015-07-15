<?php
/**
 * File: ServiceAction.php
 * User: daijianhao(toruneko@outlook.com)
 * Date: 15/6/3 11:04
 * Description: 
 */
class ServiceAction extends RedAction {

    public function run() {
        $query = $this->request->getPost('Service', array());
        $model = Service::model();
        $model->attributes = $query;
        $condition = $this->createSearchCriteria($query);
        $pager = new CPagination($model->count($condition));
        $pager->setPageSize(20);
        $condition['offset'] = $pager->getOffset();
        $condition['limit'] = $pager->getLimit();
        $data = $model->findAll($condition);
        $this->render('service', array(
            'data' => new RedArrayDataProvider($data),
            'pager' => $pager,
            'model' => $model,
        ));
    }
}