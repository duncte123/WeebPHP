<?php

namespace WeebPHP;

use WeebPHP\types\Environment;

interface WeebPHP {

    public function setEnvironment(Environment $environment);
    public function setBotInfo(String $botName, String $version, String $extra = null);

}