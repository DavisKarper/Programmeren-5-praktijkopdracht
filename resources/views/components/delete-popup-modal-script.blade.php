<script>
    function removeBackdrop() {
        const backdrop = document.querySelector('[modal-backdrop]');
        if (backdrop) {
            backdrop.remove();
        }
    }
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            mutation.addedNodes.forEach((node) => {
                if (node.nodeType === 1 && node.hasAttribute('modal-backdrop')) {
                    node.remove();
                }
            });
        });
    });
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
    removeBackdrop();
</script>
