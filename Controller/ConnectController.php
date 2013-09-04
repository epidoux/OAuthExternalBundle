<?php

namespace Epidoux\OAuthExternalBundle\Controller;

use Epidoux\OAuthExternalBundle\Factories\ServiceFactory;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ConnectController
 * @package epidoux\OAuthExternalBundle\Controller
 * @author Eric Pidoux
 * @version 1.0
 */
class ConnectController extends ContainerAware
{
    /**
     * Display the list of services defined into the config file
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response Display the list of services button
     */
    public function listAction(Request $request)
    {
        $info=array();
        //get all services array(name=>array(token,secret),...)
        $services = $this->container->get('connector.service')->getConnectors();
        return $this->container->get('templating')->renderResponse('EpidouxOAuthExternalBundle:Services:list.html.twig',
            array(
                "services"=>$services
            )
        );
    }

    /**
     * Request the token
     * @param Request $request
     * @return the view
     */
    public function connectAction(Request $request)
    {
        //request token and if already connected redirect on view or redirect on service
        $connector = $this->container->get('connector.service')->getConnector($request->get('connectorName'),$request);

        $result = $this->container->get('connector.service')->connect($connector,$request);
        if(filter_var($result, FILTER_VALIDATE_URL) )
        { //redirect to the given url
            return new RedirectResponse($result);
        }
        else return new Response($result);
    }

    /**
     * Callback endpoint connector
     * @param Request $request
     * @return the view or redirection
     */
    public function callbackAction(Request $request)
    {

    }


    /**
     * Display the button provider
     * @param $provider string the provider to show
     * @return the twig response

    public function showAction($provider)
    {
        $services = $this->container->getParameter("hybridauth.services");
        $info=null;
        foreach($services as $key=>$service)
        {
            $service_name = ucfirst($key);
            if($service_name==$provider)
            {
                $service_expected = $service;
                $key_expected = $key;
                $callback = $this->container->getParameter("hybridauth.callback");
                $this->container->get('hybridauth.auth')->auth($service_name,array("hauth_return_to"=>$callback));
                $info = $this->container->get('hybridauth.auth')->getUserInfo();
                //store session data
                $session = $this->container->get('hybridauth.auth')->getSessionData($service_name);
                $this->container->get('session')->set(ServiceFactory::getInstance()->findName($service_name),$session);
            }
        }

        return $this->container->get('templating')->renderResponse('epidouxHybridAuthBundle:Services:show.html.twig',
            array(
                "provider"=>$provider,
                "service"=>$service_expected,
                "key"=>$key_expected,
                "info"=>$info
            )
        );
    }*/

}
