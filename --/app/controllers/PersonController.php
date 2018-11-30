<?php

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;

/**
 * Created by PhpStorm.
 * User: hootan
 * Date: 11/29/18
 * Time: 8:34 PM
 */
class PersonController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $status = null;
        $schema = Person::class;
        $data = [];
        $meta = [];
        $response = new Response();
        $persons = Person::find();
        if (!empty($persons)) {
            $status = Status::create(Status::FOUND);
            $response->setStatusCode(Status::FOUND["code"]);
        } else {
            $status = Status::create(Status::NOT_FOUND);
            $response->setStatusCode(Status::NOT_FOUND["code"]);

        }

        foreach ($persons as $person) {
            array_push($data, $person);
        }


        $customResponse = new CustomResponse($status, $schema, $data, $meta);
        $response->setContent(json_encode($customResponse));
        return $response;
    }


    public function getSinglePersonAction($id)
    {
        $status = null;
        $schema = Person::class;
        $data = [];
        $meta = [];
        $response = new Response();
        $person = Person::findFirst("id=".$id);
        array_push($data, $person);

        if ($person) {
            $status = Status::create(Status::FOUND);
            $response->setStatusCode(Status::FOUND["code"]);
        } else {
            $status = Status::create(Status::NOT_FOUND);
            $response->setStatusCode(Status::NOT_FOUND["code"]);

        }

        $customResponse = new CustomResponse($status, $schema, $data, $meta);
        $response->setContent(json_encode($customResponse));
        return $response;

    }

    public function createPersonAction()
    {
        $status = null;
        $schema = Person::class;
        $data = [];
        $meta = [];
        $response = new Response();
        $request = $this->request;

        $customRequest = CustomRequest::create($request->getJsonRawBody(true));

        $data = $customRequest->getData();
        //TODO: check for valid data
        $personObject = $data[0];
        $newPerson = new Person();
        $newPerson->setFullName($personObject['fullName']);
        $success = $newPerson->save();
        array_push($data, $newPerson);

        if ($success) {
            $status = Status::create(Status::CREATED);
            $response->setStatusCode(Status::CREATED["code"]);
        } else {
            $status = Status::create(Status::CONFLICT);
            $response->setStatusCode(Status::CONFLICT["code"]);

        }

        $customResponse = new CustomResponse($status, $schema, $data, $meta);
        $response->setContent(json_encode($customResponse));
        return $response;
    }

    public function updatePerson($id)
    {
        $status = null;
        $schema = Person::class;
        $data = [];
        $meta = [];
        $response = new Response();
        $request = $this->request;
        $person = Person::findFirst("id=".$id);

        $customRequest = CustomRequest::create($request->getJsonRawBody(true));

        $data = $customRequest->getData();
        //TODO: check for valid data
        $personObject = $data[0];
        $person->setFullName($personObject['fullName']);
        print($personObject['fullName']);
        $success = $person->save();
        array_push($data, $person);

        if ($success) {
            $status = Status::create(Status::OK);
            $response->setStatusCode(Status::CREATED["code"]);
        } else {
            $status = Status::create(Status::CONFLICT);
            $response->setStatusCode(Status::CONFLICT["code"]);

        }

        $customResponse = new CustomResponse($status, $schema, $data, $meta);
        $response->setContent(json_encode($customResponse));
        return $response;

    }

    public function deletePerson($id)
    {
        $status = null;
        $schema = Person::class;
        $data = [];
        $meta = [];
        $response = new Response();
        $person = Person::findFirst("id=".$id);
        $success = $person->delete();

        if ($success) {
            $status = Status::create(Status::OK);
            $response->setStatusCode(Status::OK["code"]);
        } else {
            $status = Status::create(Status::CONFLICT);
            $response->setStatusCode(Status::CONFLICT["code"]);

        }
        $customResponse = new CustomResponse($status, $schema, $data, $meta);
        $response->setContent(json_encode($customResponse));
        return $response;
    }
}