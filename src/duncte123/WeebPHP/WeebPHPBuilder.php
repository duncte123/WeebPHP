<?php
/**
 * MIT License
 *
 * Copyright (c) 2018 Duncan Sterken
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace duncte123\WeebPHP;

use duncte123\WeebPHP\types\Environment;
use duncte123\WeebPHP\types\TokenType;

class WeebPHPBuilder {

    private $tokenType = TokenType::__default;
    private $botInfo;
    private $environment = Environment::__default;
    private $token;

    public function __construct(String $tokenType) {
        $this->tokenType = $tokenType;
    }

    public function setEnvironment(String $environment) {
        $this->environment = $environment;
        return $this;
    }

    public function setBotInfo(String $botName, String $version, String $extra = null) {
        $this->botInfo = $botName . '/' . $version;
        if(!is_null($extra))
            $this->botInfo .= '/' . $extra;
        return $this;
    }

    public function setToken(String $token) {
        $this->token = $token;
        return $this;
    }

    public function build() {
        if($this->token == null)
            throw new \InvalidArgumentException("Token must be set first via setToken");
        return new WeebPHPImpl(
            $this->environment,
            $this->token,
            $this->tokenType,
            $this->botInfo
        );
    }

}