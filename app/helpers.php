<?php

if( ! function_exists('asset_url'))
{
    /**
     * Generate a URL for an asset with a md5 version of file content.
     *
     * @param string $path
     *
     * @return string
     */
    function asset_url($path)
    {
        $url = asset($path);

        if(file_exists(public_path($path)))
        {
            return $url . '?' . filemtime(public_path($path));
        }

        return $url;
    }
}
