<?php
/**
 * Copyright © All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Shumski\Minicart\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Minicart slide Helper
 */
class Data extends AbstractHelper
{
    const DEFAULT_MINICART_CONTENT_TEMPLATE = 'Magento_Checkout/minicart/content';
    const XML_PATH_MINICART_SLIDE_TEMPLATE = 'is_slide';
    const XML_PATH_MINICART_AUTO_OPEN = 'auto_open';
    const XML_PATH_MINICART_SHOW_OVERLAY = 'show_overlay';

    public function getConfigValue($field, $storeId = null)
    {
        $path = 'minicart/general/' . $field;

        return $this->scopeConfig->getValue(
            $path,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function getGeneralConfig($field, $storeId = null)
    {
        return $this->getConfigValue($field, $storeId);
    }

    /**
     * Get config setting is_slide for minicart
     *
     * @return bool
     */
    public function getIsSlide(): bool
    {
        return $this->getConfigValue(self::XML_PATH_MINICART_SLIDE_TEMPLATE);
    }

    /**
     * Get config setting is_auto_open for minicart
     *
     * @return bool
     */
    public function getIsAutoOpen(): bool
    {
        return $this->getConfigValue(self::XML_PATH_MINICART_AUTO_OPEN);
    }

    /**
     * Get config setting show_overlay for minicart
     *
     * @return bool
     */
    public function getShowOverlay(): bool
    {
        return $this->getConfigValue(self::XML_PATH_MINICART_SHOW_OVERLAY);
    }

    /**
     * Get template for the minicart content
     *
     * @param string $slideTemplate
     * @return string
     */
    public function getTemplate(string $slideTemplate): string
    {
        if ($this->getIsSlide()) {
            return $slideTemplate;
        }

        return self::DEFAULT_MINICART_CONTENT_TEMPLATE;
    }
}
