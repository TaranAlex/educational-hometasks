<?php
class Request
{
    public $errors = [];
    public $cleanPostParams = [];
    public function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === "GET";
    }
    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === "POST";
    }
    public function minMax($name, $min, $max)
    {
        if (mb_strlen($this->getFromPostWithClean($name)) > $max) {
            $this->errors[$name][] = 'Максимальное кол-во символов ' . $max;
        } elseif (mb_strlen($this->getFromPostWithClean($name)) < $min) {
            $this->errors[$name][] = 'Минимальное кол-во символов ' . $min;
        }
        return $this;
    }
    public function required($name)
    {
        if (empty($this->getFromPostWithClean($name))) {
            $this->errors[$name][] = 'Поле обязательно для заполнения';
        }
        return $this;
    }
    public function validateEmail($name)
    {
        $value = $this->getFromPostWithClean($name);
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$name][] = 'E-mail адрес указан неверно.';
        }
        return $this;
    }
    public function isValid()
    {
        return !count($this->errors);
    }
    public function getErrors()
    {
        return $this->errors;
    }
    public function getFromPostWithClean($name)
    {
        if(isset($this->cleanPostParams[$name]) && $this->cleanPostParams[$name]) {
            return $this->cleanPostParams[$name];
        }else {
            $value = $_POST[$name];
            $value = trim($value);
            $value = htmlspecialchars($value);
            $this->cleanPostParams[$name] = $value;
            return $value;
        }
    }
}
?>