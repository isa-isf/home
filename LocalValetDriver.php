<?php

final class LocalValetDriver extends LaravelValetDriver
{
    public function serves($sitePath, $siteName, $uri)
    {
        return true;
    }

    public function isStaticFile($sitePath, $_, $uri)
    {
        $staticFilePath = $sitePath . '/public' . $uri;

        if ($this->isActualFile($staticFilePath)) {
            return $staticFilePath;
        }

        return false;
    }

    public function frontControllerPath($sitePath, $_, $uri)
    {
        $_SERVER['PHP_SELF'] = $uri;
        $_SERVER['SERVER_NAME'] = $_SERVER['HTTP_HOST'];

        if (str_starts_with($uri, '/wordpress/')) {
            if (is_dir($sitePath . '/public' . $uri)) {
                $uri = $this->forceTrailingSlash($uri);

                return $sitePath . '/public' . $uri . '/index.php';
            }

            return $sitePath . '/public' . $uri;
        }

        return $sitePath . '/public/index.php';
    }

    private function forceTrailingSlash(string $uri): string
    {
        if (str_ends_with($uri, '/wordpress/wp-admin')) {
            header('Location: ' . $uri . '/');
            die;
        }

        return $uri;
    }
}

