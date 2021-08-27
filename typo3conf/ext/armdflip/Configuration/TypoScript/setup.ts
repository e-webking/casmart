page.includeCSS {
    file1001 = EXT:armdflip/Resources/Public/dflip/css/dflip.min.css
    file1002 = EXT:armdflip/Resources/Public/dflip/css/themify-icons.min.css
}
page.includeJSFooter {
    file1001 = EXT:armdflip/Resources/Public/dflip/js/dflip.min.js
}
plugin.tx_armdflip {
    view {
        templateRootPaths.0 = EXT:armdflip/Resources/Private/Templates/
        templateRootPaths.10 = {$plugin.tx_armdflip.view.templateRootPath}
        partialRootPaths.0 = EXT:armdflip/Resources/Private/Partials/
        partialRootPaths.10 = {$plugin.tx_armdflip.view.partialRootPath}
        layoutRootPaths.0 = EXT:armdflip/Resources/Private/Layouts/
        layoutRootPaths.10 = {$plugin.tx_armdflip.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_armdflip.persistence.storagePid}
    }
}