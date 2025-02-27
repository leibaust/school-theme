document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.wp-block-gallery').forEach(galleryBlock => {
        lightGallery(galleryBlock, { selector: 'a' });
    });
});
