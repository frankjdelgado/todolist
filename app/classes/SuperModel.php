<?php

/*
|--------------------------------------------------------------------------
| Validation class for models
|--------------------------------------------------------------------------
|
| Validate data with rules defined inside the model and set errors if any.
|
*/

class SuperModel extends Eloquent
{

	// Model rules
    protected $rules = array();

    // Model errors
    protected $errors;

    // Check if $data is valid or not
    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);

        // check for failure
        if ($v->fails())
        {
            // get eloquent errors and return false
            $this->errors = $v->errors();
            return false;
        }

        // validation pass
        return true;
    }

    // Return eloquent errors
    public function errors()
    {
        return $this->errors;
    }
}