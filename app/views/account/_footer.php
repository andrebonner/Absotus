        <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
        <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
        
        <?php foreach ($this->js as $js) { ?>
            <script src="<?php echo $this->data['cfg']->url . $js; ?>" type="text/javascript" ></script>
        <?php } ?>
            <script type="text/javascript" lang="javascript">
        $(document).ready(function () {
    $(document).mousemove(function (e) {
        TweenLite.to($('body'),
                .5,
                {css:
                            {
                                backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px"
                            }
                });
    });});
        </script>
    </body>
</html>
