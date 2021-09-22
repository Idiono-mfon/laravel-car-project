<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()

    {
        // Methods we can use on files is concern
        // guessExtension() --- To get Image (check example below)
        // $test = $this->file("image")->guessExtension(); //return the file extension

        // getMimeType() --- To get MimeType
        // $test = $this->file("image")->getMimeType(); //return the file
        //$test = $this->file("image")->isValid(); //return the file
        // dd($test);
        // store()
        // asStore()
        // storePublicly()
        // move()
        // getClientOriginalName() //Returns the image name
        // getSize (returns the size of the image)
        // getError (returns an integer error value if ther was an error 0 means no erro while 1 indicate error)
        // IsValid() /// returns true of false if it is the right image extension (** read this again)
        //
        //dd($test);
        return [
            // mimes|max:5048(KB)
            "name" => "required|unique:cars,name",
            "image" => "required|mimes:png,jpg,jpeg|max:5048",
            // Checking if the name attribute is uppercase
            // "name" => new Uppercase, (Using the rule created)
            "founded" => "required|integer|min:0|max:2021",
            "description" => "required"
        ];
    }
}
