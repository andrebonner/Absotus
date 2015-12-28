        <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
        <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
        <?php foreach ($this->js as $js) { ?>
            <script src="<?php echo $this->data['cfg']->url . $js; ?>" type="text/javascript" ></script>
        <?php } ?>
    </body>
</html>
