<?php

namespace Inc\Base;

/**
 * Helper functions for video rendering and video identification.
 *
 * This class provides functions to render video players and identify video types.
 *
 * @package    HeadlessTheme
 * @author     Farmer Arif
 * @since      1.0.0
 */
class VideoRenderer {

    /**
     * Render video based on the type (YouTube, Vimeo, or local video).
     *
     * @param string $url The video URL.
     * @param string $className Additional classes for styling (optional).
     * @return string The HTML for the video iframe or video tag.
     */
    public static function renderVideo(string $url, string $className = ''): string {
        $videoData = self::identifyVideo($url);
        $iframeBaseClasses = 'w-100 aspect-video';
        $combinedClasses = self::combineClasses([$iframeBaseClasses, $className]);

        switch ($videoData['type']) {
            case 'youtube':
                return $videoData['id'] ? 
                    self::getIframe("https://www.youtube.com/embed/{$videoData['id']}?autoplay=0&controls=0&showinfo=0&rel=0&modestbranding=1&wmode=transparent", $combinedClasses, "YouTube Video Player") 
                    : '';
            case 'vimeo':
                return $videoData['id'] ? 
                    self::getIframe("https://player.vimeo.com/video/{$videoData['id']}", $combinedClasses, "Vimeo Video Player") 
                    : '';
            case 'local':
                return "<video class='{$combinedClasses}' controls>
                            <source src='{$url}' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>";
            default:
                return '';  // Return empty string if no valid video type
        }
    }

    /**
     * Combine CSS classes into a single string, filtering out empty values.
     *
     * @param array $classes Array of class names.
     * @return string The combined class string.
     */
    public static function combineClasses(array $classes): string {
        return implode(' ', array_filter($classes));
    }

    /**
     * Identify the type of video (YouTube, Vimeo, or local).
     *
     * @param string $url The video URL.
     * @return array An associative array with 'type' (youtube, vimeo, local) and 'id' (video ID or null).
     */
    public static function identifyVideo(string $url): array {
        if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
            return ['type' => 'youtube', 'id' => self::getYouTubeId($url)];
        }

        if (strpos($url, 'vimeo.com') !== false) {
            return ['type' => 'vimeo', 'id' => self::getVimeoId($url)];
        }

        return ['type' => 'local', 'id' => null];
    }

    /**
     * Extract the YouTube video ID from a URL.
     *
     * @param string $url The YouTube video URL.
     * @return string|null The video ID or null if not found.
     */
    private static function getYouTubeId(string $url): ?string {
        $regex = '/(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|.*v=))([a-zA-Z0-9_-]{11})/';
        preg_match($regex, $url, $matches);
        return $matches[1] ?? null;
    }

    /**
     * Extract the Vimeo video ID from a URL.
     *
     * @param string $url The Vimeo video URL.
     * @return string|null The video ID or null if not found.
     */
    private static function getVimeoId(string $url): ?string {
        $regex = '/(?:vimeo\.com\/)(\d+)/';
        preg_match($regex, $url, $matches);
        return $matches[1] ?? null;
    }

    /**
     * Generate an iframe HTML element.
     *
     * @param string $src The video source URL.
     * @param string $class The class string for the iframe.
     * @param string $title The title of the iframe (for accessibility).
     * @return string The iframe HTML.
     */
    private static function getIframe(string $src, string $class, string $title): string {
        return "<iframe class='{$class}' src='{$src}' frameborder='0' allowfullscreen title='{$title}'></iframe>";
    }
}
