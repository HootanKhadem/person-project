<?php
/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

/**
 * Add your routes here
 */
$app->get('/', function () {
    echo $this['view']->render('index');
});

$app->get('/api/v1/personList', function () {
    $controller = new PersonController();
    return $controller->indexAction();
});
$app->get('/api/v1/person/{id}', function ($id) {
    $controller = new PersonController();
    return $controller->getSinglePersonAction($id);
});
$app->put('/api/v1/person/{id}', function ($id) {
    $controller = new PersonController();
    return $controller->updatePerson($id);
});
$app->delete('/api/v1/person/{id}', function ($id) {
    $controller = new PersonController();
    return $controller->deletePerson($id);
});

$app->post('/api/v1/person', function () {
    $controller = new PersonController();
    return $controller->createPersonAction();
});

//$api = new MicroCollection();
//$api->setPrefix('/api/v1/');
//$api->setHandler('PersonController', true);
//$api->get('/personList/', 'index', 'get.persons');
//$api->post('/person/', 'createPersonAction', 'create.person');
//$app->mount($api);
//$router = new Router(false);

////Define a route
//$di = new \Phalcon\DI\FactoryDefault();
//$router->setDI($di);
//$router->addGet(
//    "/api/v1/personList/",
//     'Person::index'
//);

//$router->handle();

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app['view']->render('404');
});
