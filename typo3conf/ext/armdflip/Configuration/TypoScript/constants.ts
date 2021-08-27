
plugin.tx_armdflip {
    view {
        # cat=plugin.tx_armdflip_minilist/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:armdflip/Resources/Private/Templates/
        # cat=plugin.tx_armdflip_minilist/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:armdflip/Resources/Private/Partials/
        # cat=plugin.tx_armdflip_minilist/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:armdflip/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_armdflip_minilist//a; type=string; label=Default storage PID
        storagePid = 
    }
}
