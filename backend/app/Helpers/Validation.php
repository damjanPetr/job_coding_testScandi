<?php

namespace Helpers;

class Validation
{
    private $data;
    private $errors = [];


    public function __construct(array $data)
    {
        $this->data = $data;
    }


    public function validateAllFieldsRequired()
    {


        foreach ($this->data as $key => $value) {

            if (empty($value)) {
                $this->errors[$key] = 'Please, submit required data';
            } else {
            }
        }

        ;
        return $this;

    }
    public function validateFieldNumberOnly($field)
    {
        foreach (str_split($this->data[$field]) as $char) {

            if (!empty($this->errors[$field])) {
                break;
            }
            if (!is_numeric($char)) {

                $this->errors[$field] = 'Please, provide the data of indicated type';
            }
        }

        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }


    public function isValid()
    {
        return empty($this->errors);
    }

    public function addError($key, $value)
    {
        $this->errors[$key] = $value;
    }

}
