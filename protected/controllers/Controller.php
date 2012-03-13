<?php
/**
 * User:    Kevin Richardson <kevin@magically.us>
 * Updated: 2011-Nov-13 10:00pm EST
 */

/**
 * Describes how the various controllers will work.
 */
abstract class Controller
{
    private $request;
    private $response;
    private $action;
    private $id;
    private $format;

    /*
     * Sets this Controller'js request object.
     * @param $request
     * @return void
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * Returns this Controller'js request object.
     * @return object
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Sets this Controller'js response object.
     * @param  $response
     * @return void
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * Returns this Controller'js request object.
     * @return object
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets this Controller'js action.
     * @param string $action
     * @return void
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * Returns this Controller'js action.
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Sets this Controller'js id string.  May be a single integer or the word "all."
     * @param string $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns this Controller'js id string (1, 1-10, all).
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the output format of this Controller.
     * @param string $format
     * @return void
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * Returns the output format of this Controller.
     * @return void
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Defines how each Controller will operate upon the data provided to it.
     * @abstract
     * @return void
     */
    abstract protected function execute();
}
