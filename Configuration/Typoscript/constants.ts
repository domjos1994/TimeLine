plugin.tx_timeline_pi1 {
    settings {
        # cat=tx_timeline_pi1/enable/a; type=boolean; label=Include JQuery: Include JQuery by extension
        jquery = 1

        # cat=tx_timeline_pi1/style/a; type=options[Layout 1, Layout 2, Layout 3]; label=Style: The style of the Timeline
        layout = Layout 1
        # cat=tx_timeline_pi1/style/b; type=boolean; label=Year: Show the year of the events only
        year = 0
        # cat=tx_timeline_pi1/color/a; type=color; label=Background-Color:The Background-Color of the Timeline
        back_color = #fff
        # cat=tx_timeline_pi1/color/b; type=color; label=Background-Color:The Foreground-Color of the Timeline
        fore_color = #000

        # cat=tx_timeline_pi1/other/a; type=options[asc, desc, none]; label=Order:The Order of the timeline-items
        order = desc

        # cat=tx_timeline_pi1/file/a; type=string; label=Custom css: Include custom Stylesheet for Timeline
        customCSS = 
    }
}
