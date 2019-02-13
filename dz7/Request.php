<?php
class Request
{
    protected $errors = [];
    protected $cleanPostParams = [];

    public function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === "GET";
    }
    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === "POST";
    }
    public function required($name)
    {
        if(empty($this->getFromPostWithClean($name))) {
            $this->errors[$name][] = 'Поле обязательно для заполнения';
        }
        return $this;
    }
    public function min($name, $min)
    {
        if(mb_strlen($this->getFromPostWithClean($name)) < $min) {
            $this->errors[$name][] = 'Минимальное кол-во символов ' . $min;
        }
        return $this;
    }
    public function max($name, $max)
    {
        if(mb_strlen($this->getFromPostWithClean($name)) > $max) {
            $this->errors[$name][] = 'Максимальное кол-во символов ' . $max;
        }
        return $this;
    }
    public function isValidEmail($name)
    {
        $email = $this->getFromPostWithClean($name);

        if (empty($email))
        {
            $this->errors[$name][] = 'Вы не заполнили поле E-Mail';        
        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->errors[$name][] = 'E-mail адрес '.$email.' указан неверно. E-mail должен иметь вид user@somehost.com';
            }
        return $this;
        }
    }
    /*public function isValidDate($name)
    {
        $date = $this->getFromPostWithClean($name);
        $date1 = strtotime($date);
        $date2 = strtotime(date('d.m.Y'));
        $month = date('n', $date1);
        $day = date('j', $date1);
        $year = date('Y', $date1);

        if (($date1 < $date2) && (!checkdate ($month ,$day ,$year ))) {
            $this->errors[$name][] = 'Неверная дата';
        }
        return $this;
    }*/
    public function isValidDate($name)
    {
        $date = $this->getFromPostWithClean($name);
        $date1 = strtotime($date);
        $date2 = strtotime(date('d.m.Y'));
        
        if (($date1 < $date2) && (!date_parse($date))) {
            $this->errors[$name][] = 'Неверная дата';
        }
        return $this;
    }
    public function isUnsignedInt($name)
    {
        $filter_options = array( 
            'options' => array( 'min_range' => 0,
                        'max_range' => 2147483647 )
            );

        if(!filter_var($this->getFromPostWithClean($name), FILTER_VALIDATE_INT, $filter_options)) {
            $this->errors[$name][] = 'В поле должно быть число';
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
    /*
     * Получение и очистка из поста.
     */
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
    // required
    // array
    // between
    // e-mail
    // greaterThan
    // in
    // lessThan
    // max
    // min
    // notIn
    // string
}