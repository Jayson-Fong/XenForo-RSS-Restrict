<?php
class jayson_RSR_Extend_XenForo_ControllerPublic_Forum extends XFCP_jayson_RSR_Extend_XenForo_ControllerPublic_Forum {
    public function actionIndex() {
        $parent = parent::actionIndex();
        $options = XenForo_Application::get('options');
        if ($this->_routeMatch->getResponseType() != 'rss') {
            return $parent;
        }
        if ($options->jayson_rsr_enable) {
            throw new XenForo_Exception(new XenForo_Phrase('jayson_rsr_rss_disabled'), true);
        }
        if ($options->jayson_rsr_useragent && empty(@$_SERVER['HTTP_USER_AGENT'])) {
            throw new XenForo_Exception(new XenForo_Phrase('jayson_rsr_useragent_required'), true);
        }
        return $parent;
    }
}