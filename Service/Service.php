<?php

namespace EWZ\Bundle\AuthBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\HttpFoundation\Request;

/**
 * Service is the base class for all service classes.
 */
abstract class Service
{
    protected $session;
    protected $request;

    /**
     * Sets the Container objects.
     *
     * @param ContainerInterface $container A ContainerInterface instance
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->session = $container->get('session');
        $this->request = $container->get('request');
    }

    /**
     * Gets a Login URL for use with redirects.
     *
     * @param string $next       The URL to go to after a successful login
     * @param string $cancel     The URL to go to after the user cancels
     * @param array  $parameters Provide custom parameters
     *
     * @return string The URL for the login flow
     */
    abstract public function getLoginUrl($next, $cancel, array $parameters = array());

    /**
     * Gets a Logout URL suitable for use with redirects.
     *
     * @param string $next       The URL to go to after a successful logout
     * @param array  $parameters Provide custom parameters
     *
     * @return string The URL for the logout flow
     */
    abstract public function getLogoutUrl($next, array $parameters = array());

    /**
     * Gets the profile from the session.
     *
     * @return array The profile if available
     */
    abstract public function getProfile();

    /**
     * Gets the profile friends.
     *
     * @param string $user_id The user id
     * @param string $token   An identifier token
     *
     * @return array The profile friends if available
     */
    abstract function getFriends($userId = null, $token = null);

    /**
     * Returns the canonical name of this service.
     *
     * @return string The canonical name
     */
    abstract function getName();

    /**
     * Make a GET request to the service
     *
     * @param  string $path
     * @param  array  $params
     *
     * @return  array The result
     */
    abstract public function get($path, $params=array());

    /**
     * Make a POST request to the service
     *
     * @param  string $path
     * @param  array  $params
     *
     * @return  array The result
     */
    abstract public function post($path, $params=array());

    /**
     * Make a PUT request to the service
     *
     * @param  string $path
     * @param  array  $params
     *
     * @return  array The result
     */
    abstract public function put($path, $params=array());

    /**
     * Make a DELETE request to the service
     *
     * @param  string $path
     * @param  array  $params
     *
     * @return  array The result
     */
    abstract public function delete($path, $params=array());
}
