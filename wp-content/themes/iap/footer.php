    <div class="footer">
        <div class="container">
            <div class="footer-inner">
                <?php if (is_active_sidebar('footer')): ?> <!-- daca exista widget-uri in zona denumite  "sidebar" -->
                <?php dynamic_sidebar('footer'); ?> <!-- afisam widget-urile din zona "sidebar" -->
                <?php endif ?>
                <a href="#">Back to top</a>
            </div>
        </div>
    </div>
</body>
</html>