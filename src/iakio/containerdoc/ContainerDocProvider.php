<?php
namespace iakio\containerdoc;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Silex\ServiceProviderInterface;

class ContainerDocProvider implements ControllerProviderInterface
{
    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        /** @var ControllerCollection $controllers */
        $controllers = $app['controllers_factory'];
        $controllers->get('/', function () use ($app) {
            $keys = $app->keys();
            sort($keys);
            $doc = array();
            foreach ($keys as $key) {
                try {
                    $val = $app[$key];
                    if (is_scalar($val)) {
                        $doc[$key] = array('Scalar', var_export($val, true));
                    } elseif (is_array($val)) {
                        $doc[$key] = array('Array', count($val));
                    } elseif (is_object($val)) {
                        $doc[$key] = array('Object', get_class($val));
                    } else {
                    }
                } catch (\Exception $e) {
                    $doc[$key] = array('Exception', $e->getMessage());
                }
            }
            ob_start();
            require __DIR__ . "/../../../templates/containerdoc.html";
            return ob_get_clean();
        });
        return $controllers;
    }
}
