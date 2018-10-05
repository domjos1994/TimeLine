lib.calc = TEXT
lib.calc {
    current = 1
    prioriCalc = 1
}

plugin.tx_timeline_pi1 {
    settings {
        jquery = {$plugin.tx_timeline_pi1.settings.jquery}
        layout = {$plugin.tx_timeline_pi1.settings.layout}
        year = {$plugin.tx_timeline_pi1.settings.year}
        color = {$plugin.tx_timeline_pi1.settings.color}
        customCSS = {$plugin.tx_timeline_pi1.settings.customCSS}
    }
}


[globalString = LIT:{$plugin.tx_timeline_pi1.settings.customCSS} = /.+/]
page.includeCSS.file = {$plugin.tx_timeline_pi1.settings.customCSS}
[else]
page.includeCSS.file = EXT:timeline/Resources/Public/Css/timeline.css
[global]
[globalVar = LIT:1 = {$plugin.tx_timeline_pi1.settings.jquery}]
page.includeJSFooter.file = EXT:timeline/Resources/Public/Js/jquery.js
[global]
page.includeJSFooter.file = EXT:timeline/Resources/Public/Js/timeline.js