<?php
class Validation
{
    public function validate($data, $rules)
    {
        $errors = [];
        foreach ($rules as $key => $rule) {
            $rules = explode('|', $rule);
            foreach ($rules as $rule) {
                $value = $data[$key];
                if ($rule == 'required') {
                    if (empty($value)) {
                        $errors[$key][] = 'The ' . $key . ' field is required';
                    }
                } elseif (substr($rule, 0, 3) == 'min') {
                    $min = explode(':', $rule)[1];
                    if (strlen($value) < $min) {
                        $errors[$key][] = 'The ' . $key . ' field must be at least ' . $min . ' characters';
                    }
                } elseif (substr($rule, 0, 3) == 'max') {
                    $max = explode(':', $rule)[1];
                    if (strlen($value) > $max) {
                        $errors[$key][] = 'The ' . $key . ' field may not be greater than ' . $max . ' characters';
                    }
                } elseif ($rule == 'email') {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $errors[$key][] = 'The ' . $key . ' field must be a valid email address';
                    }
                } elseif ($rule == 'unique') {
                    $class = explode(':', $rule)[1];
                    $obj = new $class;
                    $method = explode(':', $rule)[2];
                    $result = $obj->$method($value);
                    if ($result) {
                        $errors[$key][] = 'The ' . $key . ' field must be unique';
                    }
                } elseif ($rule == 'numeric') {
                    if (!is_numeric($value)) {
                        $errors[$key][] = 'The ' . $key . ' field must be a number';
                    }
                }
            }
        }
        return $errors;
    }
}
