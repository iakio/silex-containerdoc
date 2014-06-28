<?php
namespace iakio\containerdoc;

use Silex\Application;
use Silex\ServiceProviderInterface;

class ContainerDocProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app->get('/containerdoc', function () use ($app) {
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
    }

    public function boot(Application $app)
    {
    }
}
