<?php

namespace DominicJoas\Timeline\ViewHelpers;

use Closure;
use Exception;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class IncludeFileViewHelper extends  AbstractViewHelper {
    use CompileWithRenderStatic;

    public function initializeArguments() {
        parent::initializeArguments();

        $this->registerArgument("file", "string", "Path to file to include in template");
        $this->registerArgument("footer", "bool", "Include in Footer!");
    }

    /**
     * @param array $arguments
     * @param Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     */
    public static function renderStatic(array $arguments, Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {
        $file = $arguments['file'];
        $footer = (bool)$arguments['footer'];

        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        if (TYPO3_MODE === 'FE') {

            try {
                $path = '';
                if(class_exists('FilePathSanitizer')) {
                    $sanitizer = GeneralUtility::makeInstance(\TYPO3\CMS\Frontend\Resource\FilePathSanitizer::class);
                    $path = $sanitizer->sanitize($file);
                } else {
                    $path = $file;
                }
                // JS
                if (strtolower(substr($path, -3)) === '.js') {
                    if ($footer) {
                        $pageRenderer->addJsFooterFile($path, null, true, false, '', true);
                    } else {
                        $pageRenderer->addJsFile($path, null, true, false, '', true);
                    }

                    // CSS
                } elseif (strtolower(substr($path, -4)) === '.css') {
                    $pageRenderer->addCssFile($path, 'stylesheet', 'all', '', true, false, '', true);
                }
            } catch (Exception $e) {}
        } else {
            // JS
            if (strtolower(substr($file, -3)) === '.js') {
                $pageRenderer->addJsFile($file, null, true, false, '', true);

                // CSS
            } elseif (strtolower(substr($file, -4)) === '.css') {
                $pageRenderer->addCssFile($file, 'stylesheet', 'all', '', true, false, '', true);
            }
        }
    }
}