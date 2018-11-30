<?php

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;

/**
 * Created by PhpStorm.
 * User: hootan
 * Date: 11/29/18
 * Time: 7:48 PM
 */


class Person extends Model
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $fullName;


    public function validation()
    {
        $validator = new Validation();

        $validator->add(
        'fullName',
        new Uniqueness(
            [
                'message' => 'The person name must be unique',
            ]
        )
    );

        return $this->validate($validator);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return void
     */
    public function setFullName(string $fullName)
    {
        $this->fullName = $fullName;
    }

    public function getSource() {
        return "persons";
    }

}