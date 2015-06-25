<?php

namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('ms2s', array($this, 'ms2sFilter')),
        );
    }

    public function ms2sFilter($input)
    {
        $remainderMs = $input % 1000;
        $wholeSec = floor($input / 1000);

        $remainderSec = $wholeSec % 60;
        $wholeMin = floor($wholeSec / 60);

        $remainderMin = $wholeMin % 60;
        $wholeHour = floor($wholeMin / 60); 

        $display = '';
        if ($wholeHour > 0) {
            $display .= $wholeHour.':';
        }

        if ($wholeMin > 0) {
            $display .= $wholeMin.':';
        }

        $display .= $wholeSec.'.'.$remainderMs;

        return $display;
    }

    public function getName()
    {
        return 'app_extension';
    }
}