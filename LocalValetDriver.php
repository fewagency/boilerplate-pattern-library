<?php

class LocalValetDriver extends BasicValetDriver
{
    /**
     * @var string The public web directory, if deeper under the root directory
     */
    protected $public_dir = 'public';

    /**
     * Determine if the driver serves the request.
     *
     * @param  string $sitePath
     * @param  string $siteName
     * @param  string $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return true;
    }

    /**
     * Determine if the incoming request is for a static file.
     *
     * @param  string $sitePath
     * @param  string $siteName
     * @param  string $uri
     * @return string|false
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        $sitePath = $this->realSitePath($sitePath);
        if ($this->isActualFile($staticFilePath = $sitePath . $uri)) {
            return $staticFilePath;
        }

        return false;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string $sitePath
     * @param  string $siteName
     * @param  string $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        $sitePath = $this->realSitePath($sitePath);

        return parent::frontControllerPath($sitePath, $siteName, $uri);
    }

    /**
     * Translate the site path to the actual public directory
     *
     * @param $sitePath
     * @return string
     */
    protected function realSitePath($sitePath)
    {
        if ($this->public_dir) {
            $sitePath .= "/" . $this->public_dir;
        }

        return $sitePath;
    }
}
